<?php
//$arr = [1, 1, 1, 2, 3, 3, 4, 4, 4, 5, 5, 6];
//$arr = [1, 1, 1, 2, 3, 3, 4, 4, 4, 5, 5, 6, 6, 6, 6];
$arr = explode(' ', trim(fgets(STDIN)));
//$arr = [0, 0, 0, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2];
//$arr = [1, 2, 1, 2, 1, 2, 2, 1];

$start = 0;
$len = 1;

$best_start = $start;
$best_len = $len;

for ($pos = 1; $pos < count($arr); $pos++) {
    if ($arr[$pos] == $arr[$pos - 1]) {
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