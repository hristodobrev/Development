<?php
$num = intval(fgets(STDIN));
$symbols = 'ATCGTTAGGG';
$symbolOffset = 0;

for ($row = 0; $row < $num; $row++) {
    $symbol1 = $symbols[$symbolOffset];
    $symbolOffset++;
    $symbolOffset = $symbolOffset % strlen($symbols);
    $symbol2 = $symbols[$symbolOffset];
    $symbolOffset++;
    $symbolOffset = $symbolOffset % strlen($symbols);

    $row0 = "**{$symbol1}{$symbol2}**";
    $row1 = "*{$symbol1}--{$symbol2}*";
    $row2 = "{$symbol1}----{$symbol2}";
    $row3 = $row1;

    $currentRow = 'row' . ($row % 4);
    echo $$currentRow . "\n";
}