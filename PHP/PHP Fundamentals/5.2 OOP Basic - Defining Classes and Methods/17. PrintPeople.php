<?php
class Person
{
    public $name;
    public $age;
    public $occupation;

    public function __construct($name, $age, $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function __toString()
    {
        return $this->name . ' - age: ' . $this->age . ', occupation: ' . $this->occupation;
    }
}

$people = [];

$line = trim(fgets(STDIN));
while ($line != 'END') {
    $tokens = explode(' ', $line);
    $person = new Person($tokens[0], intval($tokens[1]), $tokens[2]);
    $people[] = $person;

    $line = trim(fgets(STDIN));
}

usort($people, function($a, $b){
    return $a->age > $b->age;
});

foreach ($people as $person) {
    echo $person . PHP_EOL;
}