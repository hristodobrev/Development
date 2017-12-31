<?php
$max = PHP_INT_MIN;
while ($num = intval(fgets(STDIN))) {
    if($max < $num) {
        $max = $num;
    }
}

echo "Max: {$max}";