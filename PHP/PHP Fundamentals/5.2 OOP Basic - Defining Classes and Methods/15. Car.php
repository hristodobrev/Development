<?php


class Car
{
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $distanceTraveled;
    private $timeTraveled;

    public function __construct($speed, $fuel, $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
    }

    public function getDistance()
    {
        return 'Total Distance: ' . number_format($this->distanceTraveled, 1) . PHP_EOL;
    }

    public function getTime()
    {
        $hours = intval(floor($this->timeTraveled / 60));
        $minutes = intval(floor($this->timeTraveled % 60));
        return 'Total Time: ' . $hours . ' hours and ' . $minutes . ' minutes' . PHP_EOL;
    }

    public function getFuel()
    {
        return 'Fuel left: ' . number_format($this->fuel, 1) . ' liters' . PHP_EOL;
    }

    public function travel($distance)
    {
        if ($this->fuel == 0) {
            return;
        }

        $fuelRequired = $distance * ($this->fuelEconomy / 100);
        if ($fuelRequired > $this->fuel) {
            $distance = 100 * ($this->fuel / $this->fuelEconomy);
        }

        $this->timeTraveled += ($distance / $this->speed) * 60;
        $this->distanceTraveled += $distance;
        $this->fuel = max($this->fuel - $fuelRequired, 0);
    }

    public function refuel($amount)
    {
        $this->fuel += $amount;
    }
}

$input = explode(' ', trim(fgets(STDIN)));
$car = new Car(intval($input[0]), intval($input[1]), intval($input[2]));

$line = trim(fgets(STDIN));
while ($line != 'END') {
    $tokens = explode(' ', $line);
    switch ($tokens[0]) {
        case 'Travel':
            $car->travel(intval($tokens[1]));
            break;
        case 'Distance':
            echo $car->getDistance();
            break;
        case 'Time':
            echo $car->getTime();
            break;
        case 'Fuel':
            echo $car->getFuel();
            break;
        case 'Refuel':
            echo $car->refuel($tokens[1]);
            break;
    }
    $line = trim(fgets(STDIN));
}