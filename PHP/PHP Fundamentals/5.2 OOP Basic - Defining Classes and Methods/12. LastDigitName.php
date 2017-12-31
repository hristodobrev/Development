<?php
class Number
{
    const DIGIT_NAMES = [
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
    ];

    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function lastDigitName()
    {
        $lastDigit = $this->number % 10;

        return self::DIGIT_NAMES[$lastDigit];
    }
}

$number = intval(fgets(STDIN));
$number = new Number($number);

echo $number->lastDigitName();