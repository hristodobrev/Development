<?php
$points = explode(', ', trim(fgets(STDIN)));
$x1 = $points[0];
$y1 = $points[1];
$x2 = $points[2];
$y2 = $points[3];
$x3 = $points[4];
$y3 = $points[5];

$dist1to2 = getDistance($x1, $y1, $x2, $y2);
$dist2to3 = getDistance($x2, $y2, $x3, $y3);
$dist3to1 = getDistance($x1, $y1, $x3, $y3);

if ($dist1to2 > $dist2to3 && $dist1to2 > $dist3to1) {
    echo '1->3->2: ' . ($dist3to1 + $dist2to3);
} else if ($dist2to3 > $dist3to1 && $dist2to3 > $dist1to2) {
    echo '2->1->3: ' . ($dist1to2 + $dist3to1);
} else if ($dist3to1 > $dist1to2 && $dist3to1 > $dist2to3) {
    echo '1->2->3: ' . ($dist1to2 + $dist2to3);
} else if ($dist1to2 == $dist2to3 && $dist1to2 == $dist3to1) {
    echo '1->2->3: ' . ($dist1to2 + $dist2to3);
} else if ($dist1to2 == $dist2to3) {
    echo '1->3->2: ' . ($dist2to3 + $dist3to1);
} else {
    echo '1->2->3: ' . ($dist1to2 + $dist2to3);
}

function getDistance($x1, $y1, $x2, $y2)
{
    return sqrt(($x1 - $x2) * ($x1 - $x2) + ($y1 - $y2) * ($y1 - $y2));
}