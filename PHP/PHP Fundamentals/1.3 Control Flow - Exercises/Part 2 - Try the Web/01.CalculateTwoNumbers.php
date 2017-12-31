<!doctype html>
<html lang="en">
<head>
    <title>Calculate Two Numbers</title>
</head>
<body>
<form method="get">
    <p>
        <label>
            Operation:
            <select name="operation">
                <option value="sum">Sum</option>
                <option value="subtract">Subtract</option>
            </select>
        </label>
    </p>
    <p>
        <label>
            Number 1:
            <input type="number" name="number_one">
        </label>
    </p>
    <p>
        <label>
            Number 2:
            <input type="number" name="number_two">
        </label>
    </p>
    <p>
        <input type="submit" name="calculate" value="Calculate!">
    </p>
</form>
<?php
if (isset($_GET['calculate'])) {
    $operation = $_GET['operation'];
    $numberOne = $_GET['number_one'];
    $numberTwo = $_GET['number_two'];
    echo "<ul>";
    if ($operation == 'sum') {
        echo "<li style='color: red'> " . ($numberOne + $numberTwo). "</li>";
    } else if ($operation == 'subtract') {
        echo "<li style='color: red'> " . ($numberOne - $numberTwo). "</li>";
    } else {
        echo "<li style='color: red'> Invalid operation supplied</li>";
    }
    echo "</ul>";
}
?>
</body>
</html>