<?php
//$arr = explode(' ', trim(fgets(STDIN)));

//$arr = [3, 14, 5, 12, 15, 7, 8, 9, 11, 10, 1];
$arr = [11, 12, 13, 3, 14, 4, 15, 5, 6, 7, 8, 7, 16, 9, 8];

$P = [];
$M = [];

$L = 0;
for ($i = 0; $i < count($arr); $i++) {
    $lo = 1;
    $hi = $L;
    while ($lo <= $hi) {
        $mid = intval(ceil($lo + $hi) / 2);
        if ($arr[$M[$mid]] < $arr[$i]) {
            $lo = $mid + 1;
        } else {
            $hi = $mid - 1;
        }
    }
    $newLo = $lo;
    $P[$i] = $M[$newLo - 1];
    $M[$newLo] = $i;

    if ($newLo > $L) {
        $L = $newLo;
    }
}

$S = [];
$k = $M[$L];
for ($i = $L - 1; $i >= 0; $i--) {
    $S[$i] = $arr[$k];
    $k = $P[$k];
}

echo '<pre>';
print_r($S);
echo '<pre>';



//$len = [];
//$prev = [];
//
//for ($p = 0; $p < count($arr); $p++) {
//    $max = PHP_INT_MIN;
//    $left = -1;
//    for ($l = 0; $l < $p; $l++) {
//        if ($len[$l] > $max) {
//            $left = $l;
//        }
//    }
//    if ($left == -1) {
//        $len[$p] = 1;
//    } else {
//        $len[$p] = $len[$left] + 1;
//    }
//
//    $prev[$p] = $left;
//}
//
//echo "<pre>";
//print_r($len);
//echo "</pre>";
//
//
//echo "<pre>";
//print_r($prev);
//echo "</pre>";