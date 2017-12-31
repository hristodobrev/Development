<?php
if (isset($_GET['categories'], $_GET['tags'], $_GET['months'])) {
    $categories = explode(', ', $_GET['categories']);
    $tags = explode(', ', $_GET['tags']);
    $months = explode(', ', $_GET['months']);

    echo '<h2>Categories</h2>';
    echo '<ul>';
    foreach ($categories as $category) {
        echo "<li>{$category}</li>";
    }
    echo '</ul>';
    echo '<h2>Tags</h2>';
    echo '<ul>';
    foreach ($tags as $tag) {
        echo "<li>{$tag}</li>";
    }
    echo '</ul>';
    echo '<h2>Months</h2>';
    echo '<ul>';
    foreach ($months as $month) {
        echo "<li>{$month}</li>";
    }
    echo '</ul>';
}

include "04. NavigationBuilderFrontEnd.php";