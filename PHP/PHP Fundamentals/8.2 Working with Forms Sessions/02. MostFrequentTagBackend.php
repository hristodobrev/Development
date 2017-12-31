<?php
session_start();
if (isset($_GET['submit'])) {
    $tags = [];
    if (isset($_SESSION['tags'])) {
        $tags = $_SESSION['tags'];
    }

    $current_tags = explode(', ', $_GET['tags']);
    foreach ($current_tags as $current_tag) {
        if (trim($current_tag) == '') {
            continue;
        }

        if (!array_key_exists($current_tag, $tags)) {
            $tags[$current_tag] = 1;
        } else {
            $tags[$current_tag]++;
        }
    }

    arsort($tags);

    $_SESSION['tags'] = $tags;
    $_SESSION['most_frequent_tag'] = key($tags);
}

if (isset($_GET['reset'])) {
    $_SESSION['tags'] = [];
}

include '02. MostFrequentTag.php';