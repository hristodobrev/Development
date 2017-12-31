<?php

class Fibonacci
{
    private $numbers;

    public function __construct()
    {
        $this->numbers = [0, 1, 1];
    }

    public function getNumbersInRange($startIndex, $endIndex)
    {
        $this->calculateNumbersInRange($endIndex);
        $nums = [];
        for ($i = $startIndex; $i < $endIndex; $i++) {
            $nums[] = $this->numbers[$i];
        }

        return $nums;
    }

    private function calculateNumbersInRange($range)
    {
        for ($i = 3; $i < $range; $i++) {
            $this->numbers[$i] = $this->numbers[$i - 2] + $this->numbers[$i - 1];
        }
    }
}

$start = intval(fgets(STDIN));
$end = intval(fgets(STDIN));

$fibonacci = new Fibonacci();
echo implode(', ', $fibonacci->getNumbersInRange($start, $end));