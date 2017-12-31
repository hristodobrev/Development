<?php
$num = intval(trim(fgets(STDIN)));
$commands = explode(', ', trim(fgets(STDIN)));

foreach ($commands as $command) {
    $num = executeCommand($command, $num);
    echo $num . "\n";
}

function executeCommand($cmd, $num)
{
    switch ($cmd) {
        case 'chop':
            return $num / 2;
        case 'dice':
            return sqrt($num);
        case 'spice':
            return $num + 1;
        case 'bake':
            return $num * 3;
        case 'fillet':
            return $num * 0.8;
    }
}