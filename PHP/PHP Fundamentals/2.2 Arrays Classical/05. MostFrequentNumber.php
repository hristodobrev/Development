<?php
//$arr = [7, 7, 7, 0, 2, 2, 2, 0, 10, 10, 10];
$arr = explode(' ', trim(fgets(STDIN)));

$nums_count = [];

for ($pos = 0; $pos < count($arr); $pos++) {
    if (isset($nums_count[$arr[$pos]])) {
        $nums_count[$arr[$pos]]++;
    } else {
        $nums_count[$arr[$pos]] = 1;
    }
}

$best_num = 0;
$best_count = 1;
foreach ($nums_count as $num => $count) {
    if ($count > $best_count) {
        $best_num = $num;
        $best_count = $count;
    }
}

echo $best_num;