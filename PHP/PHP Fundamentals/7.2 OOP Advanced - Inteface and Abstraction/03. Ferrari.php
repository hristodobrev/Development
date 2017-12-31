<?php

interface Movable
{
    public function move();
}

interface Stoppable
{
    public function stop();
}

class Car implements Stoppable , Movable
{
    private $model;
    private $driver;

    public function __construct($driver, $model = '488-Spider')
    {
        $this->model = $model;
        $this->driver = $driver;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getDriver()
    {
        return $this->driver;
    }

    public function move()
    {
        return 'Zadu6avam sA!';
    }

    public function stop()
    {
        return 'Brakes!';
    }

    public function __toString()
    {
        return $this->getModel() . '/' . $this->stop() . '/' . $this->move() . '/' . $this->getDriver();
    }
}

$driver = trim(fgets(STDIN));
$car = new Car($driver);
echo $car;