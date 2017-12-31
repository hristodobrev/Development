<?php

interface IPerson
{
    public function getName() : string;

    public function getAge() : int;
}

class Citizen implements IPerson
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getAge() : int
    {
        return $this->age;
    }

    public function __toString()
    {
        return $this->getName() . PHP_EOL . $this->getAge() . PHP_EOL;
    }
}

$name = trim(fgets(STDIN));
$age = intval(fgets(STDIN));
$citizen = new Citizen($name, $age);
echo $citizen;