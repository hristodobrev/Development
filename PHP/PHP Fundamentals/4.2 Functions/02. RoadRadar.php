<?php

$speed = intval(trim(fgets(STDIN)));
$area = trim(fgets(STDIN));

speedLimit($speed, $area);

function speedLimit($speed, $area)
{
    $limits = [
        'motorway' => 130,
        'interstate' => 90,
        'city' => 50,
        'residential' => 20
    ];

    $speedDifference = $speed - $limits[$area];
    if ($speedDifference > 40) {
        echo 'reckless driving';
    } else if ($speedDifference > 20) {
        echo 'excessive speeding';
    } else if ($speedDifference >= 0) {
        echo 'speeding';
    }
}