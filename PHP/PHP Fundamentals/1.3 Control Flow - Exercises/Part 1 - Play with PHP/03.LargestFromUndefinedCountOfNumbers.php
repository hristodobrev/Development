<?php
$max = 0;
while ($num = intval(fgets(STDIN))) {
    if($max < $num) {
        $max = $num;
    }
}

echo "Max: {$max}";