<?php

class Dough
{
    const FLOUR_TYPES = [
        'white',
        'wholegrain'
    ];
    const BAKING_TECHNIQUES = [
        'crispy',
        'chewy',
        'homemade'
    ];

    private $weight;
    private $flourType;
    private $bakingTechnique;

    public function __construct($flourType, $bakingTechnique, int $weight)
    {
        $this->setWeight($weight);
        $this->setFlourType($flourType);
        $this->setBakingTechnique($bakingTechnique);
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        if ($weight < 1 || $weight > 200) {
            throw new Exception('Dough weight should be in the range [1..200].');
        }

        $this->weight = $weight;
    }

    /**
     * @param mixed $bakingTechnique
     */
    public function setBakingTechnique($bakingTechnique)
    {
        if (!in_array(strtolower($bakingTechnique), self::BAKING_TECHNIQUES)) {
            throw new Exception('Invalid type of dough.');
        }

        $this->bakingTechnique = $bakingTechnique;
    }

    /**
     * @param mixed $flourType
     */
    public function setFlourType($flourType)
    {
        if (!in_array(strtolower($flourType), self::FLOUR_TYPES)) {
            throw new Exception('Invalid type of dough.');
        }

        $this->flourType = $flourType;
    }

    public function getCaloriesPerGram()
    {
        $calories = 2 * $this->weight;
        switch (strtolower($this->flourType)) {
            case 'white':
                $calories *= 1.5;
        }

        switch (strtolower($this->bakingTechnique)) {
            case 'crispy':
                $calories *= 0.9;
                break;
            case 'chewy':
                $calories *= 1.1;
                break;
        }

        return $calories;
    }
}

class Topping
{
    const VALID_TYPES = [
        'sauce',
        'veggies',
        'meat',
        'cheese'
    ];

    private $weight;
    private $type;

    public function __construct($type, int $weight)
    {
        $this->setType($type);
        $this->setWeight($weight);
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        if ($weight < 1 || $weight > 50) {
            throw new Exception("{$this->type} weight should be in the range [1..50].");
        }

        $this->weight = $weight;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        if (!in_array(strtolower($type), self::VALID_TYPES)) {
            throw new Exception("Cannot place {$type} on top of your pizza.");
        }

        $this->type = $type;
    }

    public function getCaloriesPerGram()
    {
        $calories = $this->weight * 2;

        switch (strtolower($this->type)) {
            case 'meat':
                $calories *= 1.2;
                break;
            case 'veggies':
                $calories *= 0.8;
                break;
            case 'cheese':
                $calories *= 1.1;
                break;
            case 'sauce':
                $calories *= 0.9;
                break;
        }

        return $calories;
    }
}

class Pizza
{
    /**
     * @var int $toppingsCount
     */
    private $toppingsCount;
    /**
     * @var Topping[] $toppings
     */
    private $toppings;
    /**
     * @var Dough $dough
     */
    private $dough;
    /**
     * @var string $name
     */
    private $name;

    public function __construct(string $name, $toppingsCount)
    {
        $this->setName($name);
        $this->setToppingsCount($toppingsCount);
    }

    /**
     * @return int
     */
    public function getToppingsCount(): int
    {
        return $this->toppingsCount;
    }

    /**
     * @param int $toppingsCount
     */
    public function setToppingsCount(int $toppingsCount)
    {
        if ($toppingsCount < 0 || $toppingsCount > 10) {
            throw new Exception('Number of toppings should be in range [0..10].');
        }

        $this->toppingsCount = $toppingsCount;
    }

    /**
     * @return Topping[]
     */
    public function getToppings(): array
    {
        return $this->toppings;
    }

    /**
     * @param Topping $topping
     */
    public function addTopping(Topping $topping)
    {
        $this->toppings[] = $topping;
    }

    /**
     * @return Dough
     */
    public function getDough(): Dough
    {
        return $this->dough;
    }

    /**
     * @param Dough $dough
     */
    public function setDough(Dough $dough)
    {
        $this->dough = $dough;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        if (strlen(trim($name)) < 1 || strlen(trim($name)) > 15) {
            throw new Exception('Pizza name should be between 1 and 15 symbols.');
        }

        $this->name = $name;
    }

    public function getCaloriesPerGram()
    {
        $totalCalories = $this->getDough()->getCaloriesPerGram();
        foreach ($this->getToppings() as $topping) {
            $totalCalories += $topping->getCaloriesPerGram();
        }

        return number_format($totalCalories, 2, '.', '');
    }

    public function __toString()
    {
        return $this->getName() . ' - ' . $this->getCaloriesPerGram() . ' Calories.';
    }
}


try {
    $input = explode(' ', trim(fgets(STDIN)));
    $pizza = new Pizza($input[1], $input[2]);

    $input = explode(' ', trim(fgets(STDIN)));
    $dough = new Dough($input[1], $input[2], $input[3]);

    $pizza->setDough($dough);

    $lines = $pizza->getToppingsCount();
    while ($lines--) {
        $input = explode(' ', trim(fgets(STDIN)));
        $topping = new Topping($input[1], $input[2]);
        $pizza->addTopping($topping);
    }

    echo $pizza . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}