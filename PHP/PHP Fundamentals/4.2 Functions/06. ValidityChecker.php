<?php

$points = explode(', ', trim(fgets(STDIN)));
$x1 = $points[0];
$y1 = $points[1];
$x2 = $points[2];
$y2 = $points[3];

echo "{{$x1}}, {{$y1}} to {0}, {0} is " . (isValidDistiance($x1, $y1, 0, 0) ? 'valid' : 'invalid') . "\n";
echo "{{$x2}}, {{$y2}} to {0}, {0} is " . (isValidDistiance($x2, $y2, 0, 0) ? 'valid' : 'invalid') . "\n";
echo "{{$x1}}, {{$y1}} to {{$x2}}, {{$y2}} is " . (isValidDistiance($x1, $y1, $x2, $y2) ? 'valid' : 'invalid') . "\n";

function isValidDistiance($x1, $y1, $x2, $y2)
{
    $distance = sqrt(($x1 - $x2) * ($x1 - $x2) + ($y1 - $y2) * ($y1 - $y2));

    return $distance == floor($distance);
}