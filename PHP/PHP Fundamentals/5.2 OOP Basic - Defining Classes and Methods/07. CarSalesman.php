<?php
class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct($model, $power, $displacement = 'n/a', $efficiency = 'n/a')
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @return string
     */
    public function getDisplacement(): string
    {
        return $this->displacement;
    }

    /**
     * @return string
     */
    public function getEfficiency(): string
    {
        return $this->efficiency;
    }
}

class Car
{
    /**
     * @var Engine
     */
    private $engine;
    private $model;
    private $color;
    private $weight;

    public function __construct($model, Engine $engine, $weight = 'n/a', $color = 'n/a')
    {
        $this->engine = $engine;
        $this->model = $model;
        $this->color = $color;
        $this->weight = $weight;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    public function __toString()
    {
        return $this->getModel() . ':' . PHP_EOL
            . '  ' . $this->getEngine()->getModel() . ':' . PHP_EOL
            . '    Power: ' . $this->getEngine()->getPower() . PHP_EOL
            . '    Displacement: ' . $this->getEngine()->getDisplacement() . PHP_EOL
            . '    Efficiency: ' . $this->getEngine()->getEfficiency() . PHP_EOL
            . '  Weight: ' . $this->getWeight() . PHP_EOL
            . '  Color: ' . $this->getColor() . PHP_EOL;
    }
}

$enginesCount = intval(fgets(STDIN));
/**
 * @var Engine[] $engines
 */
$engines = [];
while ($enginesCount--) {
    $tokens = explode(' ', trim(fgets(STDIN)));
    // displ, eff = B
    $model = $tokens[0];
    $power = $tokens[1];
    $displacement = 'n/a';
    $efficiency = 'n/a';
    if (count($tokens) > 3) {
        $displacement = $tokens[2];
        $efficiency = $tokens[3];
    } else if (count($tokens) > 2) {
        if (is_numeric($tokens[2])) {
            $displacement = $tokens[2];
        } else {
            $efficiency = $tokens[2];
        }
    }

    $engines[$model] = new Engine($model, $power, $displacement, $efficiency);
}

$carsCount = intval(fgets(STDIN));
/**
 * @var Car[] $cars
 */
$cars = [];
while ($carsCount--) {
    $tokens = explode(' ', trim(fgets(STDIN)));
    $model = $tokens[0];
    $engine = $engines[$tokens[1]];
    $weight = 'n/a';
    $color = 'n/a';
    if (count($tokens) > 3) {
        $weight = $tokens[2];
        $color = $tokens[3];
    } else if (count($tokens) > 2) {
        if (is_numeric($tokens[2])) {
            $weight = $tokens[2];
        } else {
            $color = $tokens[2];
        }
    }

    $cars[] = new Car($model, $engine, $weight, $color);
}

foreach ($cars as $car) {
    echo $car;
}