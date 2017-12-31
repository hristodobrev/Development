<?php
$arr = explode(' ', fgets(STDIN));
$iterations = intval(fgets(STDIN));

$sum_arr = array_fill(0, count($arr), 0);

for ($i = 0; $i < $iterations; $i++) {
    $arr = rotate($arr);
    for ($k = 0; $k < count($arr); $k++) {
        $sum_arr[$k] += $arr[$k];
    }
}

print_array($sum_arr);


function print_array($arr)
{
    echo implode(' ', $arr);
}

function rotate($arr)
{
    $last = $arr[(count($arr) - 1)];
    $arr = array_splice($arr, 0, count($arr) - 1);
    array_splice($arr, 0, 0, $last);

    return $arr;
}