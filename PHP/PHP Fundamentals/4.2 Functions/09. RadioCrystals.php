<?php
$input = explode(', ', trim(fgets(STDIN)));
$finalResult = intval($input[0]);

for ($i = 1; $i < count($input); $i++) {
    executeOperations($finalResult, intval($input[$i]));
}

function executeOperations($finalResult, $value)
{
    echo "Processing chunk {$value} microns\n";
    $cutsCount = 0;
    $lapsCount = 0;
    $grindsCount = 0;
    $etchesCount = 0;
    $xRayCount = 0;
    while ($value / 4 >= $finalResult) {
        $cutsCount++;
        $value /= 4;
    }
    $value = floor($value);
    while ($value * 0.8 >= $finalResult) {
        $lapsCount++;
        $value *= 0.8;
    }
    $value = floor($value);
    while ($value - 20 >= $finalResult) {
        $grindsCount++;
        $value -= 20;
    }
    $value = floor($value);
    while ($value - 2 >= $finalResult - 1) {
        $etchesCount++;
        $value -= 2;
    }
    $value = floor($value);
    if ($value < $finalResult) {
        $value++;
        $xRayCount++;
    }
    $value = floor($value);

    if ($cutsCount > 0) {
        echo 'Cut x' . $cutsCount . "\n";
        echo 'Transporting and washing' . "\n";
    }
    if ($lapsCount > 0) {
        echo 'Lap x' . $lapsCount . "\n";
        echo 'Transporting and washing' . "\n";
    }
    if ($grindsCount > 0) {
        echo 'Grind x' . $grindsCount . "\n";
        echo 'Transporting and washing' . "\n";
    }
    if ($etchesCount > 0) {
        echo 'Etch x' . $etchesCount . "\n";
        echo 'Transporting and washing' . "\n";
    }
    if ($xRayCount > 0) {
        echo 'X-ray x' . $xRayCount . "\n";
    }
    echo "Finished crystal {$value} microns\n";
}