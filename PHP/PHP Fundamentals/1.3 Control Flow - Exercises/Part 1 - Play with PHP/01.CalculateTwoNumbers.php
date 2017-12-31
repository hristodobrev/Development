<?php
$operation = $argv[1];
$numberOne = intval(fgets(STDIN));
$numberTwo = intval(fgets(STDIN));

if (strtolower($operation) == 'sum') {
    echo ' == ' . ($numberOne + $numberTwo);
} else if (strtolower($operation) == 'subtract') {
    echo ' == ' . ($numberOne - $numberTwo);
} else {
    echo ' == Wrong operation supplied';
}
