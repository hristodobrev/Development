<?php
class Person
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function sayHello()
    {
        return $this->name . ' says "Hello"!';
    }
}

$name = trim(fgets(STDIN));
$person = new Person($name);
$fields = count(get_object_vars($person));
$methods = count(get_class_methods($person));

echo $person->sayHello();