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
        Enter number of years: <input type="text" name="years">
        <input type="submit" value="Show Costs">
    </p>
</form>

<?php
if (isset($_GET['years'])) :
    $years = intval($_GET['years']);
    ?>
    <table>
        <tr>
            <th>Year</th>
            <?php for ($monthNum = 1; $monthNum <= 12; $monthNum++): ?>
                <th><?= getMonth($monthNum); ?></th>
            <?php endfor; ?>
            <th>Total:</th>
        </tr>
        <?php
        $sum = 0;
        for ($i = 0; $i < $years; $i++) : ?>
            <tr>
                <td><?= date('Y') - $i ?></td>
                <?php
                for ($j = 0; $j < 12; $j++) {
                    $val = rand(0, 999);
                    $sum += $val;
                    ?>
                    <td><?= $val; ?></td>
                    <?php
                }
                ?>
                <td><?= $sum;
                    $sum = 0; ?></td>
            </tr>
        <?php endfor; ?>
    </table>
<?php endif; ?>

<?php
function getMonth($monthNum)
{
    return date('F', mktime(0, 0, 0, $monthNum, 10));
}

?>
