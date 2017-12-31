<?php
$numberOne = intval(fgets(STDIN));
$numberTwo = intval(fgets(STDIN));
$numberThree = intval(fgets(STDIN));

$max = $numberOne;
if ($numberTwo > $max) {
    $max = $numberTwo;
} else if ($numberThree > $max) {
    $max = $numberThree;
}

echo "Max: {$max}";