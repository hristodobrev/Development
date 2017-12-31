<?php
$arr = explode(' ', trim(fgets(STDIN)));

$sum = 0;
for ($i = 0; $i < count($arr); $i++) {
    $sum += reverse_num($arr[$i]);
}

echo $sum;

function reverse_num($num)
{
    $num = $num . '';
    $num = array_reverse(str_split($num));
    return intval(implode('', $num));
}