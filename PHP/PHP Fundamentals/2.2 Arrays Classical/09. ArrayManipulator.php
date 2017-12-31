<?php
$arr = explode(' ', trim(fgets(STDIN)));

while (($line = trim(fgets(STDIN))) != 'print') {
    $args = explode(' ', $line);
    $cmd = $args[0];
    array_shift($args);

    switch ($cmd) {
        case 'add':
            $index = $args[0];
            $element = $args[1];
            array_splice($arr, $index, 0, $element);
            break;
        case 'addMany':
            $index = $args[0];
            array_shift($args);
            array_splice($arr, $index, 0, $args);
            break;
        case 'contains':
            $element = $args[0];
            $index = -1;
            for ($i = 0; $i < count($arr); $i++) {
                if ($element == $arr[$i]) {
                    $index = $i;
                    break;
                }
            }
            echo $index . "\n";
            break;
        case 'remove':
            $index = $args[0];
            array_splice($arr, $index, 1);
            break;
        case 'shift':
            $index = floor($args[0] % count($arr));
            $left = array_splice($arr, $index);
            array_splice($left, count($left), 0, $arr);
            $arr = $left;
            break;
        case 'sumPairs':
            $temp = [];
            for ($i = 0; $i < count($arr) / 2; $i++) {
                if(isset($arr[$i * 2 + 1])) {
                    $temp[$i] = $arr[$i * 2] + $arr[$i * 2 + 1];
                } else {
                    $temp[$i] = $arr[$i * 2];
                }
            }
            $arr = $temp;
            break;
    }
}

echo '[' . implode(', ', $arr) . ']';