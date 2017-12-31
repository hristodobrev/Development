<?php
class Person
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $age;

    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
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
        if (strlen($name) < 4) {
            throw new Exception("Name's length should not be less than 3 symbols!");
        }

        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @throws Exception
     */
    public function setAge(int $age)
    {
        if ($age <= 0) {
            throw new Exception('Age must be positive!');
        }

        $this->age = $age;
    }

    public function __toString()
    {
        return $this->getName() . PHP_EOL . $this->getAge() . PHP_EOL;
    }
}

class Child extends Person
{
    public function __construct(string $name, int $age)
    {
        $this->setAge($age);
        parent::__construct($name, $age);
    }

    public function setAge(int $age)
    {
        if ($age > 15) {
            throw new Exception("Child's age must be less than 16!");
        }

        parent::setAge($age);
    }
}

$name = trim(fgets(STDIN));
$age = intval(fgets(STDIN));

$person = new Person($name, $age);
echo $person;
