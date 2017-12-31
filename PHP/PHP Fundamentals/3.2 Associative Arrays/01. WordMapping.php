<?php
if (isset($_GET['input'])) {
    $text = $_GET['input'];
    $words = preg_split('/[^A-Za-z]+/', $text, -1, PREG_SPLIT_NO_EMPTY);

    $wordCounts = [];
    foreach ($words as $word) {
        $word = strtolower($word);
        if (!isset($wordCounts[$word])) {
            $wordCounts[$word] = 1;
        } else {
            $wordCounts[$word]++;
        }
    }

//    echo "<table border='2'>";
//    foreach ($wordCounts as $word => $count) {
//        echo '<tr>';
//        echo "<td>{$word}</td>";
//        echo "<td>{$count}</td>";
//        echo '</tr>';
//    }
//    echo '</table>';
}

include "01. WordMappingFrontEnd.php";