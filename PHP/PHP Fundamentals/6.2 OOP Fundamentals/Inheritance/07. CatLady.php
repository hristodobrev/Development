<?php
class Cat
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->setName($name);
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

    public function __toString()
    {
        return $this->getName();
    }
}

class Siamese extends Cat
{
    /**
     * @var int
     */
    private $earSize;

    public function __construct(string $name, int $earSize)
    {
        parent::__construct($name);
        $this->setEarSize($earSize);
    }

    /**
     * @return int
     */
    public function getEarSize(): int
    {
        return $this->earSize;
    }

    /**
     * @param int $earSize
     */
    public function setEarSize(int $earSize)
    {
        $this->earSize = $earSize;
    }

    public function __toString()
    {
        return 'Siamese ' . parent::__toString() . ' ' . $this->getEarSize();
    }
}

class Cymric extends Cat
{
    /**
     * @var int
     */
    private $furLength;

    public function __construct(string $name, int $furLength)
    {
        parent::__construct($name);
        $this->setFurLength($furLength);
    }

    /**
     * @return int
     */
    public function getFurLength(): int
    {
        return $this->furLength;
    }

    /**
     * @param int $furLength
     */
    public function setFurLength(int $furLength)
    {
        $this->furLength = $furLength;
    }

    public function __toString()
    {
        return 'Cymric ' . parent::__toString() . ' ' . $this->getFurLength();
    }
}

class StreetExtraordinaire extends Cat
{
    private $decibelsOfMeows;

    public function __construct(string $name, int $decibelsOfMeows)
    {
        parent::__construct($name);
        $this->setDecibelsOfMeows($decibelsOfMeows);
    }

    /**
     * @return mixed
     */
    public function getDecibelsOfMeows()
    {
        return $this->decibelsOfMeows;
    }

    /**
     * @param mixed $decibelsOfMeows
     */
    public function setDecibelsOfMeows($decibelsOfMeows)
    {
        $this->decibelsOfMeows = $decibelsOfMeows;
    }

    public function __toString()
    {
        return 'StreetExtraordinaire ' . parent::__toString() . ' ' . $this->getDecibelsOfMeows();
    }
}

/**
 * @var Cat[]
 */
$cats = [];
$line = trim(fgets(STDIN));
while ($line != 'End') {
    $tokens = explode(' ', $line);
    $type = $tokens[0];
    $name = $tokens[1];
    $args = $tokens[2];
    $cats[$name] = new $type($name, $args);
    $line = trim(fgets(STDIN));
}
$catName = trim(fgets(STDIN));

echo $cats[$catName];