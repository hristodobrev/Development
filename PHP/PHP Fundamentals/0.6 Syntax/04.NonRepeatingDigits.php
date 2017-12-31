<?php
$num = 1234;
$limit = min($num, 1000);

for ($i = 102; $i <= $limit; $i++) {
    $units = $i % 10;
    $tens = floor($i % 100 / 10);
    $hundreds = floor($i % 1000 / 100);
    if ($units != $tens && $tens != $hundreds && $units != $hundreds) {
        echo $i . ' ';
    }
}
