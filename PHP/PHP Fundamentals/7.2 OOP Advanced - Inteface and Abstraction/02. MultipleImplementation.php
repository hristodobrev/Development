<?php

interface IPerson
{
    public function getName() : string;

    public function getAge() : int;
}

interface Birthable
{
    public function getBirthday();
}

interface Identifiable
{
    public function getId();
}

class Citizen implements IPerson, Birthable, Identifiable
{
    private $id;
    private $name;
    private $age;
    private $birthday;

    public function __construct(string $id, string $name, int $age, $birthday)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->birthday = $birthday;
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
        return $this->getName() . PHP_EOL . $this->getAge() . PHP_EOL .
        $this->getId() . PHP_EOL . $this->getBirthday() . PHP_EOL;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getId()
    {
        return $this->id;
    }
}

$name = trim(fgets(STDIN));
$age = intval(fgets(STDIN));
$id = trim(fgets(STDIN));
$birthday = trim(fgets(STDIN));
$citizen = new Citizen($id, $name, $age, $birthday);
echo $citizen;