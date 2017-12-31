<form method="get">
    <p>
        Start Index: <input type="number" name="start">
        End Index: <input type="number" name="end">
        <input type="submit" value="Show Costs">
    </p>
</form>

<?php
    if (isset($_GET['start']) && isset($_GET['end'])) {
        $start = intval($_GET['start']);
        $end = intval($_GET['end']);
        for ($i = $start; $i <= $end; $i++) {
            if (isPrime($i)) {
                echo "<strong>{$i}</strong> ";
            } else {
                echo "{$i} ";
            }
        }
    }
?>

<?php
    function isPrime($num) : bool
    {
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }

        return true;
    }
?>