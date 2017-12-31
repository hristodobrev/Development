<?php

class Car
{
    public $model;
    public $fuelAmount;
    public $fuelCostPerKilometer;
    public $distanceTraveled;

    public function __construct(string $model, float $fuelAmount, float $fuelCostPerKilometer)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCostPerKilometer = $fuelCostPerKilometer;
        $this->distanceTraveled = 0;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return float
     */
    public function getFuelAmount(): float
    {
        return $this->fuelAmount;
    }

    /**
     * @return float
     */
    public function getFuelCostPerKilometer(): float
    {
        return $this->fuelCostPerKilometer;
    }

    /**
     * @return int
     */
    public function getDistanceTraveled(): int
    {
        return $this->distanceTraveled;
    }

    public function travelDistance($distance)
    {
        $fuelRequired = $distance * $this->fuelCostPerKilometer;
        if ($this->fuelAmount >= $fuelRequired) {
            $this->distanceTraveled += $distance;
            $this->fuelAmount -= $fuelRequired;
        } else {
            throw new Exception('Insufficient fuel for the drive');
        }
    }

    public function __toString()
    {
        return $this->getModel() . ' '
        . number_format($this->getFuelAmount(), 2) . ' '
        . $this->getDistanceTraveled() . PHP_EOL;
    }
}

$count = intval(trim(fgets(STDIN)));

$cars = [];
for ($i = 0; $i < $count; $i++) {
    $input = explode(' ', trim(fgets(STDIN)));
    $model = $input[0];
    $fuelAmount = floatval($input[1]);
    $fuelCostPerKilometer = floatval($input[2]);
    $cars[$model] = new Car($model, $fuelAmount, $fuelCostPerKilometer);
}

$line = trim(fgets(STDIN));
while ($line != 'End') {
    $tokens = explode(' ', $line);
    $model = $tokens[1];
    $distance = $tokens[2];
    try {
        $cars[$model]->travelDistance($distance);
    } catch (Exception $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }
    $line = trim(fgets(STDIN));
}

foreach ($cars as $model => $car) {
    $fuelAmount = number_format($car->getFuelAmount(), 2);
    echo $car;
}