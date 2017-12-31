<?php

if(isset($_GET['rocks'])) {
    $rocks = explode(',', $_GET['rocks']);

    $preciousElements = 0;
    $chars = range('a', 'z');
    foreach ($chars as $char) {
        $isPrecious = true;
        foreach ($rocks as $rock) {
            if (strpos($rock, $char) === false) {
                $isPrecious = false;
                break;
            }
        }

        if ($isPrecious) {
            $preciousElements++;
        }
    }

    echo $preciousElements;
}

include '01. Precious Stones_HTML.html';