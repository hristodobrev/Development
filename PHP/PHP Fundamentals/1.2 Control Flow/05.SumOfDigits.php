<style>
    table {
        border-collapse: collapse;
    }

    td, th {
        border: 1px solid black;
        padding: 0.5em;
    }
</style>

<form method="get">
    <p>
        Input String: <input type="text" name="nums">
        <input type="submit" value="Submit">
    </p>
</form>

<?php
if (isset($_GET['nums'])) :
    $nums = preg_split('/[\s,]+/', $_GET['nums']);
    ?>
    <table>
        <?php foreach ($nums as $num) : ?>
        <tr>
            <td><?= $num ?></td>
            <td><?= digitsSum($num) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php
    function digitsSum($num) {
        if (!is_numeric($num)) {
            return 'I cannot sum that';
        }

        $num = intval($num);
        $sumOfDigits = 0;
        while ($num / 10 != 0) {
            $sumOfDigits += $num % 10;
            $num = floor($num / 10);
        }

        return $sumOfDigits;
    }
?>