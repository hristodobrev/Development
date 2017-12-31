<?php
session_start();

$htmlTags = [
    'html', 'head', 'link', 'script', 'meta', 'body', 'div', 'p',
    'header', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'section', 'option', 'a',
    'main', 'article', 'input', 'button', 'aside', 'footer'
];

if (isset($_GET['submit'])) {
    $tag = $_GET['tag'];
    $valid = false;
    if (in_array($tag, $htmlTags)) {
        if (isset($_SESSION['score'])) {
            $_SESSION['score']++;
        } else {
            $_SESSION['score'] = 1;
        }

        $valid = true;
    }
}

include '04. HTMLTagsCounter.php';