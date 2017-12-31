<?php

class Engine
{
    private $speed;
    private $power;

    public function __construct(int $speed, int $power)
    {
        $this->speed = $speed;
        $this->power = $power;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getPower()
    {
        return $this->power;
    }
}

class Tire
{
    private $age;
    private $pressure;

    public function __construct(float $pressure, int $age)
    {
        $this->age = $age;
        $this->pressure = $pressure;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getPressure(): float
    {
        return $this->pressure;
    }
}

class Cagro
{
    private $weight;
    private $type;

    public function __construct(int $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getType(): string
    {
        return $this->type;
    }
}

class Car
{
    /**
     * @var Cagro
     */
    private $cagro;

    /**
     * @var Tire[]
     */
    private $tires;

    /**
     * @var Engine
     */
    private $engine;

    /**
     * @var string
     */
    private $model;

    public function __construct(
        string $model, int $engineSpeed, int $enginePower, int $cagroWeight, string $cagroType,
        float $tire1Pressure, int $tire1Age, float $tire2Pressure, int $tire2Age,
        float $tire3Pressure, int $tire3Age, float $tire4Pressure, int $tire4Age)
    {
        $this->model = $model;
        $this->cagro = new Cagro($cagroWeight, $cagroType);
        $this->engine = new Engine($engineSpeed, $enginePower);
        $this->tires = [];
        $this->tires[] = new Tire($tire1Pressure, $tire1Age);
        $this->tires[] = new Tire($tire2Pressure, $tire2Age);
        $this->tires[] = new Tire($tire3Pressure, $tire3Age);
        $this->tires[] = new Tire($tire4Pressure, $tire4Age);
    }

    public function getCagro(): Cagro
    {
        return $this->cagro;
    }

    public function getTires(): array
    {
        return $this->tires;
    }

    public function getEngine(): Engine
    {
        return $this->engine;
    }

    public function getModel(): string
    {
        return $this->model;
    }
}

$count = intval(trim(fgets(STDIN)));

/**
 * @var Car[]
 */
$cars = [];
for ($i = 0; $i < $count; $i++) {
    $tokens = explode(' ', trim(fgets(STDIN)));
    $cars[] = new Car($tokens[0], intval($tokens[1]), intval($tokens[2]),
        intval($tokens[3]), $tokens[4],
        floatval($tokens[5]), intval($tokens[6]),
        floatval($tokens[7]), intval($tokens[8]),
        floatval($tokens[9]), intval($tokens[10]),
        floatval($tokens[11]), intval($tokens[12]));
}
$type = trim(fgets(STDIN));

foreach ($cars as $car) {
    if($car->getCagro()->getType() != $type) {
        continue;
    }

    if ($type === 'fragile') {
        $isFragile = false;
        foreach ($car->getTires() as $tire) {
            if ($tire->getPressure() < 1) {
                echo $car->getModel() . PHP_EOL;
                break;
            }
        }
    } else {
        if ($car->getEngine()->getPower() > 250) {
            echo $car->getModel() . PHP_EOL;
        }
    }
}