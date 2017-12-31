<?php

class Product
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $cost;

    public function __construct(string $name, float $cost)
    {
        $this->setName($name);
        $this->setCost($cost);
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
        if (trim($name) == '') {
            throw new Exception('Name cannot be empty.');
        }

        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     */
    public function setCost(float $cost)
    {
        if ($cost < 0) {
            throw new Exception('Money cannot be negative');
        }

        $this->cost = $cost;
    }

    public function __toString()
    {
        return $this->getName();
    }
}

class Person
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $money;
    /**
     * @var Product[]
     */
    private $products;

    public function __construct($name, $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->products = [];
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
        if (trim($name) == '') {
            throw new Exception('Name cannot be empty');
        }

        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @param float $money
     */
    public function setMoney(float $money)
    {
        if ($money < 0) {
            throw new Exception('Money cannot be negative');
        }

        $this->money = $money;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        if ($product->getCost() > $this->getMoney()) {
            throw new Exception($this->getName() . " can't afford " . $product->getName());
        }

        $this->products[] = $product;
        $this->setMoney($this->getMoney() - $product->getCost());
    }

    public function __toString()
    {
        return $this->getName() . ' - '
        . (
        count($this->getProducts()) > 0
            ? implode(',', $this->getProducts())
            : 'Nothing bought'
        );
    }
}

$personTokens = explode(';', trim(fgets(STDIN)));
$personsByName = [];
foreach ($personTokens as $personToken) {
    if (trim($personToken) != '') {
        try {
            $personName = explode('=', $personToken)[0];
            $personMoney = floatval(explode('=', $personToken)[1]);

            $person = new Person($personName, $personMoney);
            $personsByName[$personName] = $person;
        } catch (Exception $exception) {
            echo $exception->getMessage() . PHP_EOL;
            exit;
        }
    }
}

$productTokens = explode(';', trim(fgets(STDIN)));
$productsByName = [];
foreach ($productTokens as $productToken) {
    if (trim($productToken) != '') {
        try {
            $productName = explode('=', $productToken)[0];
            $productCost = floatval(explode('=', $productToken)[1]);

            $product = new Product($productName, $productCost);
            $productsByName[$productName] = $product;
        } catch (Exception $exception) {
            echo $exception->getMessage() . PHP_EOL;
            exit;
        }
    }
}

$line = trim(fgets(STDIN));
while ($line != 'END') {
    try {
        $tokens = explode(' ', $line);
        $personName = $tokens[0];
        $productName = $tokens[1];
        if (!isset($personsByName[$personName])) {
            break;
        }

        if (!isset($productsByName[$productName])) {
            break;
        }

        $person = $personsByName[$personName];
        $product = $productsByName[$productName];
        $person->addProduct($product);
        echo $person->getName() . ' bought ' . $product->getName() . PHP_EOL;
    } catch (Exception $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }

    $line = trim(fgets(STDIN));
}

foreach ($personsByName as $person) {
    echo $person . PHP_EOL;
}