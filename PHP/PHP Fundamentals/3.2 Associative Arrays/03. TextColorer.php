<?php
if (isset($_GET['input'])) {
    $text = $_GET['input'];
    $text = str_replace(' ', '', $text);

    for ($i = 0; $i < strlen($text); $i++) {
        $color = floor(ord($text[$i]) % 2) == 0 ? 'red' : 'blue';
        echo "<font color='{$color}'>{$text[$i]} </font>";
    }
}

include "03. TextColorerFrontEnd.php";