<?php
$currencies = [
    'USD' => '$',
    'EUR' => '€',
    'BGN' => 'лв'
];

if (isset($_GET['amount'])) {
    $amount = floatval($_GET['amount']);
    $interest = floatval($_GET['interest']);
    $period = intval($_GET['period']);
    $currency = $_GET['currency'];

    $total = $amount;

    while ($period--) {
        $total += $total * ($interest / 1200);
    }

    $total = number_format($total, 2, '.', '');
    $symbol = $currencies[$currency];
    if ($symbol != 'лв') {
        $total = $symbol . ' ' . $total;
    } else {
        $total = $total . $symbol;
    }

}

include '03. CalculateInterest.php';