<?php

interface SoundProducibleInterface
{
    public function produceSound();
}

abstract class Animal implements SoundProducibleInterface
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $age;
    /**
     * @var string
     */
    private $gender;

    /**
     * Animal constructor.
     * @param string $name
     * @param int $age
     * @param string $gender
     */
    public function __construct($name, $age, $gender)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setGender($gender);
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
        if (trim($name) == '') {
            throw new Exception('Invalid input!');
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
     */
    public function setAge(int $age)
    {
        if ($age < 0) {
            throw new Exception('Invalid input!');
        }

        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender)
    {
        if (strtolower($gender) != 'male' && strtolower($gender) != 'female') {
            throw new Exception('Invalid input!');
        }

        $this->gender = $gender;
    }

    public abstract function produceSound();

    public function __toString()
    {
        return $this->getName() . ' ' . $this->getAge() . ' ' . $this->getGender();
    }
}

class Dog extends Animal
{
    public function __construct($name, $age, $gender)
    {
        parent::__construct($name, $age, $gender);
    }

    public function produceSound()
    {
        return 'BauBau';
    }

    public function __toString()
    {
        return 'Dog ' . parent::__toString();
    }
}

class Cat extends Animal
{
    public function __construct($name, $age, $gender)
    {
        parent::__construct($name, $age, $gender);
    }

    public function produceSound()
    {
        return 'MiauMiau';
    }

    public function __toString()
    {
        return 'Cat ' . parent::__toString();
    }
}

class Kitten extends Cat
{
    public function __construct($name, $age)
    {
        parent::__construct($name, $age, 'Female');
    }

    public function produceSound()
    {
        return 'Miau';
    }

    public function __toString()
    {
        return 'Kitten ' . $this->getName() . ' ' . $this->getAge() . ' ' . $this->getGender();
    }
}

class Tomcat extends Cat
{
    public function __construct($name, $age)
    {
        parent::__construct($name, $age, 'Male');
    }

    public function produceSound()
    {
        return 'Give me one million b***h';
    }

    public function __toString()
    {
        return 'Tomcat ' . $this->getName() . ' ' . $this->getAge() . ' ' . $this->getGender();
    }
}

class Frog extends Animal
{
    public function __construct($name, $age, $gender)
    {
        parent::__construct($name, $age, $gender);
    }

    public function produceSound()
    {
        return 'Frogggg';
    }

    public function __toString()
    {
        return 'Frog ' . parent::__toString();
    }
}

$className = trim(fgets(STDIN));
while ($className != 'Beast!') {
    $args = explode(' ', trim(fgets(STDIN)));

    try {
        $animal = null;
        switch ($className) {
            case 'Dog':
                $animal = new Dog($args[0], $args[1], $args[2]);
                break;
            case 'Cat':
                $animal = new Cat($args[0], $args[1], $args[2]);
                break;
            case 'Frog':
                $animal = new Frog($args[0], $args[1], $args[2]);
                break;
            case 'Kitten':
                $animal = new Kitten($args[0], $args[1]);
                break;
            case 'Tomcat':
                $animal = new Tomcat($args[0], $args[1]);
                break;
        }

        echo $animal . PHP_EOL;
        echo $animal->produceSound() . PHP_EOL;
    } catch (Exception $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }

    $className = trim(fgets(STDIN));
}