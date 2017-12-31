<?php
$text = trim(fgets(STDIN));
$bannedWords = explode(', ', trim(fgets(STDIN)));

foreach ($bannedWords as $bannedWord) {
    $text = preg_replace("/($bannedWord)/", str_repeat('*', strlen($bannedWord)), $text);
}

echo $text;