<?php

$coords = explode(', ', trim(fgets(STDIN)));
for ($i = 0; $i < count($coords); $i += 2) {
    echo getLocation($coords[$i], $coords[$i + 1]) . "\n";
}

function getLocation($x, $y)
{
    if ($x >= 1 && $x <= 3 && $y >= 1 && $y <= 3) {
        return 'Tuvalu';
    } else if ($x >= 0 && $x <= 2 && $y >= 6 && $y <= 8) {
        return 'Tonga';
    } else if ($x >= 5 && $x <= 7 && $y >= 3 && $y <= 6) {
        return 'Samoa';
    } else if ($x >= 8 && $x <= 9 && $y >= 0 && $y <= 1) {
        return 'Tokelau';
    } else if ($x >= 4 && $x <= 9 && $y >= 7 && $y <= 8) {
        return 'Cook';
    } else {
        return 'On the bottom of the ocean';
    }
}