<?php

class Person
{
    public $name;
    public $age;

    public function __construct($name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->age;
    }
}

class Family
{
    /**
     * @var Person[]
     */
    public $people;

    public function __construct()
    {
        $this->people = [];
    }

    public function addMember(Person $person)
    {
        $this->people[] = $person;
    }

    public function getOldestMember()
    {
        $oldest = $this->people[0];
        foreach ($this->people as $person) {
            if ($person->age > $oldest->age) {
                $oldest = $person;
            }
        }

        return $oldest;
    }
}

$nums = intval(fgets(STDIN));
$family = new Family();
while ($nums--) {
    $tokens = explode(' ', trim(fgets(STDIN)));
    $person = new Person($tokens[0], intval($tokens[1]));
    $family->addMember($person);
}

echo $family->getOldestMember();