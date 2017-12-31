<?php
$text = trim(fgets(STDIN));

$pattern = '/<a href="(.*?)">(.*?)<\/a>/';
$replacement = '[URL=\1]\2[/URL]';

$text = preg_replace($pattern, $replacement, $text);

echo $text;