<?php
$nums = explode(' ', trim(fgets(STDIN)));

$numCounts = [];

foreach ($nums as $num) {
    if (!isset($numCounts[$num])) {
        $numCounts[$num] = 1;
    } else {
        $numCounts[$num]++;
    }
}

ksort($numCounts);

foreach ($numCounts as $num => $count) {
    echo "{$num} -> {$count} times\n";
}