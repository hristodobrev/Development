<?php
$word = trim(fgets(STDIN));

$letters = [];
for ($i = 0; $i < strlen($word); $i++) {
    $char = $word[$i];
    if (!$letters[$char]) {
        $letters[$char] = 1;
    } else {
        $letters[$char]++;
    }
}

foreach ($letters as $letter => $count) {
    echo "{$letter} -> {$count}\n";
}