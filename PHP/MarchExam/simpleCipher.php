<?php

if (isset($_GET['key'], $_GET['string'])) {
    $string = $_GET['string'];
    $key = intval($_GET['key']);

    for ($i = 0; $i < strlen($string); $i++) {
        $string[$i] = modifyLetter($string[$i], $key);
    }

    echo $string;
}

function modifyLetter($letter, $key) {
    $lowerLetters = range('a', 'z');
    $capitalLetters = range('A', 'Z');

    if (in_array($letter, $lowerLetters)) {
        $position = array_search($letter, $lowerLetters);
        $position += $key;
        $position = $position % count($lowerLetters);

        return $lowerLetters[$position];
    } else if (in_array($letter, $capitalLetters)) {
        $position = array_search($letter, $capitalLetters);
        $position += $key;
        $position = $position % count($capitalLetters);

        return $capitalLetters[$position];
    } else {
        return $letter;
    }
}

include '02. Simple Cipher_HTML.html';