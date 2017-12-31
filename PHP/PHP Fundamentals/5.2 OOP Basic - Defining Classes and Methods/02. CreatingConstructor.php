<?php

class Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->age = $age;
        $this->name = $name;
        echo $this->name . ' ' . $this->age;
    }
}

$name = trim(fgets(STDIN));
$age = intval(trim(fgets(STDIN)));

$person = new Person($name, $age);