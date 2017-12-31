<?php
$var = (object)[1.4, 1.56];

if (is_numeric($var)) {
    var_dump($var);
} else {
    echo gettype($var);
}