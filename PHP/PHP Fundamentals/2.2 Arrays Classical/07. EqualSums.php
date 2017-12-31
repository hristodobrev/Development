<?php
//$arr = [1, 6, 3, 7, 3, 4, 3, 4, 3, 2, 1];
//$arr = [1, 2];
$arr = explode(' ', trim(fgets(STDIN)));

for ($pos = 0; $pos < count($arr); $pos++) {
    $left_sum = 0;
    $right_sum = 0;
    for ($left_pos = 0; $left_pos < $pos; $left_pos++) {
        $left_sum += $arr[$left_pos];
    }
    for ($right_pos = $pos + 1; $right_pos < count($arr); $right_pos++) {
        $right_sum += $arr[$right_pos];
    }

    if ($left_sum == $right_sum) {
        echo $pos;
        $found = true;
        break;
    }
}

if (!isset($found)) {
    echo 'no';
}