<?php
if (isset($_GET['submit'])) {
    $tags = explode(', ', $_GET['tags']);
}

include '01. PrintTags.php';