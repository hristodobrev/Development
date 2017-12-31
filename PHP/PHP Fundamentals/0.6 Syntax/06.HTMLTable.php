<?php
$name = 'Pesho Ivanov';
$phoneNumber = '+359890-257-154';
$age = 23;
$address = 'Levski G';
?>

<style>
    table {
        border-collapse: collapse;
    }

    tr td:first-child {
        background: orange;
        font-weight: bold;
    }

    td {
        border: 1px solid black;
        padding: 0.2em;
    }
</style>

<table>
    <tr>
        <td>Name</td>
        <td><?= $name ?></td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><?= $phoneNumber ?></td>
    </tr>
    <tr>
        <td>Age</td>
        <td><?= $age ?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?= $address ?></td>
    </tr>
</table>
