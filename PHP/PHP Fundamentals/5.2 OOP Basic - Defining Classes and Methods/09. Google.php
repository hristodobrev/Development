<?php

class Relative
{
    public $name;
    public $birthday;

    public function __construct($name, $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->birthday;
    }
}

class Car
{
    public $model;
    public $speed;

    public function __construct($model, $speed)
    {
        $this->model = $model;
        $this->speed = $speed;
    }

    public function __toString()
    {
        return $this->model . ' ' . $this->speed;
    }
}

class Pokemon
{
    public $name;
    public $type;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->type;
    }
}

class Company
{
    public $name;
    public $department;
    public $salary;

    public function __construct($name, $department, $salary)
    {
        $this->name = $name;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->department . ' ' . number_format($this->salary, 2);
    }
}

class Person
{
    public $name;

    /**
     * @var Company
     */
    public $company;

    /**
     * @var Car
     */
    public $car;

    /**
     * @var Relative[]
     */
    public $parents = [];

    /**
     * @var Relative[]
     */
    public $children = [];

    /**
     * @var Pokemon[]
     */
    public $pokemons = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addParent(Relative $parent)
    {
        $this->parents[] = $parent;
    }

    public function addChild(Relative $child)
    {
        $this->children[] = $child;
    }

    public function addPokemon(Pokemon $pokemon)
    {
        $this->pokemons[] = $pokemon;
    }

    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    public function setCar(Car $car)
    {
        $this->car = $car;
    }

    public function __toString()
    {
        return $this->name . PHP_EOL
        . 'Company:' . PHP_EOL
        . ($this->company ? $this->company . PHP_EOL : '')
        . 'Car:' . PHP_EOL
        . ($this->car ? $this->car . PHP_EOL : '')
        . 'Pokemon:' . PHP_EOL
        . (count($this->pokemons) > 0 ? implode(PHP_EOL, $this->pokemons) . PHP_EOL : '')
        . 'Parents:' . PHP_EOL
        . (count($this->parents) > 0 ? implode(PHP_EOL, $this->parents) . PHP_EOL : '')
        . 'Children:' . PHP_EOL
        . (count($this->children) > 0 ? implode(PHP_EOL, $this->children) : '');
    }
}

/**
 * @var Person[]
 */
$people = [];

//$person = new Person('Pesho');
//if (!in_array('Pesho', $people)) {
//    $people['Pesho'] = new Person('Pesho');
//}
//
//$person = $people['Pesho'];
//
//$company = new Company('PC', 'PD', 52564.523);
//$car = new Car('Subaru Impreza WRX STI', 270);
//$child = new Relative('Gosho', '01/01/2001');
//$parent = new Relative('Misho', '03/12/1990');
//
//$person->addChild($child);
//$person->addParent($parent);
//$person->car = $car;
//$person->company = $company;
//
//var_dump($person);

$line = trim(fgets(STDIN));
while ($line != 'End') {
    $tokens = explode(' ', $line);
    $personName = $tokens[0];
    $cmd = $tokens[1];

    if (!array_key_exists($personName, $people)) {
        $people[$personName] = new Person($personName);
    }

    $person = $people[$personName];
    switch (trim($cmd)) {
        case 'company':
            $person->setCompany(new Company($tokens[2], $tokens[3], floatval($tokens[4])));
            break;
        case 'car':
            $person->setCar(new Car($tokens[2], $tokens[3]));
            break;
        case 'pokemon':
            $person->addPokemon(new Pokemon($tokens[2], $tokens[3]));
            break;
        case 'parents':
            $person->addParent(new Relative($tokens[2], $tokens[3]));
            break;
        case 'children':
            $person->addChild(new Relative($tokens[2], $tokens[3]));
            break;
    }

    $line = trim(fgets(STDIN));
}

$personName = trim(fgets(STDIN));

//var_dump($people);

echo $people[$personName];