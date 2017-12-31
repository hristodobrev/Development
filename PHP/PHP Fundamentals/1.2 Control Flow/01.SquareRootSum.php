<?php $sum = 0; ?>
<style>
    table {
        border-collapse: collapse;
    }

    td, th {
        border: 1px solid black;
        padding: 0.5em;
    }
</style>
<table>
    <tr>
        <th>Number</th>
        <th>Square</th>
    </tr>
    <?php for ($i = 0; $i <= 100; $i += 2): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= round(sqrt($i), 2); $sum += sqrt($i); ?></td>
        </tr>
    <?php endfor; ?>
    <tr>
        <th>Total:</th>
        <td><?= round($sum, 2); ?></td>
    </tr>
</table>