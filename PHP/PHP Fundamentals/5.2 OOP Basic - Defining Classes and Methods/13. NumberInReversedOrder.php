<?php
class DecimalNumber
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function printReversed()
    {
        $str = ('' . $this->number);
        $len = strlen($str);
        for ($i = 0; $i < $len / 2; $i++) {
            $temp = $str[$i];
            $str[$i] = $str[$len - 1 - $i];
            $str[$len - 1 - $i] = $temp;
        }

        return $str;
    }
}

$num = floatval(fgets(STDIN));
$num = new DecimalNumber($num);

echo $num->printReversed();