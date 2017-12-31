<?php

$nums = explode(', ', trim(fgets(STDIN)));

$numsCount = count($nums);

for ($i = 0; $i < $numsCount; $i += 3) {
    $x = $nums[$i];
    $y = $nums[$i + 1];
    $z = $nums[$i + 2];

    if (insideVolume($x, $y, $z)) {
        echo "inside\n";
    } else {
        echo "outside\n";
    }
}

unset($numsCount);

function insideVolume($x, $y, $z)
{
    $isInside = $x >= 10 && $x <= 50 &&
        $y >= 20 && $y <= 80 &&
        $z >= 15 && $z <= 50;

    return $isInside;
}