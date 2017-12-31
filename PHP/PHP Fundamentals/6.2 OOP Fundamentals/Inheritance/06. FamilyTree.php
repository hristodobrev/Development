<?php

class Person
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $birthday;
    /**
     * @var Person[]
     */
    private $parents;
    /**
     * @var Person[]
     */
    private $children;

    public function __construct(string $name, string $birthday)
    {
        $this->setName($name);
        $this->setBirthday($birthday);
        $this->parents = [];
        $this->children = [];
    }

    public function addChild(Person $child)
    {
        $this->children[] = $child;
    }

    public function addParent(Person $parent)
    {
        $this->parents[] = $parent;
    }

    /**
     * @return Person[]
     */
    public function getParents(): array
    {
        return $this->parents;
    }

    /**
     * @return Person[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * @param string $birthday
     */
    public function setBirthday(string $birthday)
    {
        $this->birthday = $birthday;
    }

    public function __toString()
    {
        return $this->getName() . ' ' . $this->getBirthday();
    }

    public function getInfo()
    {
        return
            $this . PHP_EOL
            . 'Parents:' . PHP_EOL
            . implode(PHP_EOL, $this->parents) . PHP_EOL
            . 'Children:' . PHP_EOL
            . implode(PHP_EOL, $this->children) . PHP_EOL;
    }
}

$peopleByName = [];
$peopleByBirthday = [];
$personInfo = trim(fgets(STDIN));
$line = trim(fgets(STDIN));
$relations = [];
while ($line != 'End') {
    if (strpos($line, '-')) {
        $relations[] = $line;
    } else {
        $tokens = explode(' ', $line);
        $name = $tokens[0] . ' ' . $tokens[1];
        $birthday = $tokens[2];
        $person = new Person($name, $birthday);
        $peopleByName[$name] = $person;
        $peopleByBirthday[$birthday] = $person;
    }

    $line = trim(fgets(STDIN));
}

foreach ($relations as $relation) {
    $tokens = explode(' - ', $relation);
    $parent = null;
    $child = null;
    if (strpos($tokens[0], '/')) {
        $parent = $peopleByBirthday[$tokens[0]];
    } else {
        $parent = $peopleByName[$tokens[0]];
    }
    if (strpos($tokens[1], '/')) {
        $child = $peopleByBirthday[$tokens[1]];
    } else {
        $child = $peopleByName[$tokens[1]];
    }

    $parent->addChild($child);
    $child->addParent($parent);
}

$person = null;
if (strpos($personInfo, '/')) {
    $person = $peopleByBirthday[$personInfo];
} else {
    $person = $peopleByName[$personInfo];
}

echo $person->getInfo();