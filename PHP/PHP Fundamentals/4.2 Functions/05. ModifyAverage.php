<?php
$num = trim(fgets(STDIN));

while(getAverageDigits($num) < 5) {
    $num .= '9';
}

echo $num;

function getAverageDigits($num)
{
    $sumOfDigits = 0;
    $count = 0;
    for ($i = 0; $i < strlen($num); $i++) {
        $sumOfDigits += $num[$i];
        $count++;
    }

    return $sumOfDigits / $count;
}

function modifyNum($num)
{
    return $num . '9';
}