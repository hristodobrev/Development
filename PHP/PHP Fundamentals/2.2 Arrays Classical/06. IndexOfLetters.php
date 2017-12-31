<?php

$input = trim(fgets(STDIN));
$letters = [];
$index = 0;
for ($char = 'a'; $char != 'z'; $char++) {
    $letters[$char] = $index;
    $index++;
}
$letters['z'] = $index;

for ($i = 0; $i < strlen($input);$i++) {
    $char = strtolower($input[$i]);
    echo "{$char} -> {$letters[$char]}\n";
}