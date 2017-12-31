<?php
$text = trim(fgets(STDIN));
$keyword = trim(fgets(STDIN));

$regex = "/[!?.]*.*?\s+{$keyword}\s+.*?[!?.]/";

preg_match_all($regex, $text, $matches);

foreach ($matches[0] as $match) {
    echo trim($match) . "\n";
}
