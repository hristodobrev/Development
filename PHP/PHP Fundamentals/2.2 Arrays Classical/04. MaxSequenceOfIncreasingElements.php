<?php
//$arr = [1, 1, 2, 3, 4, 5, 5];
$arr = explode(' ', trim(fgets(STDIN)));

$best_start = 0;
$best_len = 1;

$start = 0;
$len = 1;

for ($pos = 1; $pos < count($arr); $pos++) {
    if ($arr[$pos] > $arr[$pos - 1]) {
        $len++;
    } else {
        $start = $pos;
        $len = 1;
    }

    if ($len > $best_len) {
        $best_start = $start;
        $best_len = $len;
    }
}

for ($i = 0; $i < $best_len; $i++) {
    echo $arr[$best_start + $i] . ' ';
}