<?php
$input1 = fgets(STDIN);
$input2 = fgets(STDIN);


$arr1 = explode(' ', $input1);
$arr2 = explode(' ', $input2);

$min_length = min(count($arr1), count($arr2));

$right_count = 0;
$left_count = 0;

$left = true;
$right = true;

for ($i = 0; $i < $min_length; $i++) {
    if ($left && $arr1[$i] == $arr2[$i]) {
        $left_count++;
    } else {
        $left = false;
    }

    if ($right && $arr1[count($arr1) - 1 - $i] == $arr2[count($arr2) - 1 - $i]) {
        $right_count++;
    } else {
        $right = false;
    }
}

echo max($right_count, $left_count);