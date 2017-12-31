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
        Enter Cars: <input type="text" name="cars">
        <input type="submit" value="Show Results">
    </p>
</form>

<?php
if (isset($_GET['cars'])) {
    $cars = preg_split('/[\s,]+/', $_GET['cars']);
    $colors = ['red', 'green', 'blue', 'yellow', 'white', 'black', 'orange'];
    $counts = [1, 2, 3, 4, 5];
    ?>
    <table>
        <tr>
            <th>Car</th>
            <th>Color</th>
            <th>Count</th>
        </tr>
        <?php foreach ($cars as $car): ?>
            <tr>
                <td><?= $car ?></td>
                <td><?= getRandom($colors) ?></td>
                <td><?= getRandom($counts) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
}
?>

<?php
function getRandom($arr)
{
    return $arr[rand(0, count($arr) - 1)];
}
?>