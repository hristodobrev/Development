<?php

/**
 * Class Person
 */
class Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->age = $age;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}

$count = intval(trim(fgets(STDIN)));

$persons = [];
for ($i = 0; $i < $count; $i++) {
    $tokens = explode(' ', trim(fgets(STDIN)));
    $name = $tokens[0];
    $age = intval($tokens[1]);
    if ($age > 30) {
        $persons[] = new Person($name, $age);
    }
}

usort($persons, function($a, $b) {
    return $a->getName() > $b->getName();
});

foreach ($persons as $person) {
    echo $person->getName() . ' - ' . $person->getAge() . PHP_EOL;
}