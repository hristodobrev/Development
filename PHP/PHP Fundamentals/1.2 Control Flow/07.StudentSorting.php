<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Sorting</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <style>
        th, td {
            padding: 0.3em;
        }

        input {
            padding: 0.2em;
        }

        table#input-table {
            border: 1px solid #333;
            border-collapse: collapse;
        }

        table#input-table th {
            border-bottom: 1px solid #333;
            text-align: left;
        }

        table#input-table > tbody > tr:last-child > td {
            padding-bottom: 0.8em;
        }

        table#input-table > tbody > tr:first-child > td {
            padding-top: 0.8em;
        }

        table#input-table > tfoot td {
            border-top: 1px solid #333;
        }

        .remove, input[type=button], input[type=submit] {
            padding: 0.2em 0.6em;
            margin-left: 0.4em;
            background: #4d4fff;
            color: white;
        }

        select {
            padding: 0.2em;
        }
    </style>
</head>
<body>
<form method="get">
    <table id="input-table">
        <thead>
        <tr>
            <th>First Name:</th>
            <th>Second Name:</th>
            <th>Email:</th>
            <th>Exam Score:</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
        <tr>
            <td colspan="4">
                <input type="button" value="+" id="add">
                <label>
                    Sort By:
                    <select name="sort">
                        <option value="first-name">First Name</option>
                        <option value="second-name">Second Name</option>
                        <option value="email">Email</option>
                        <option value="exam-score">Exam Score</option>
                    </select>
                </label>
                <label>
                    Order:
                    <select name="order">
                        <option value="ascending">Ascending</option>
                        <option value="descending">Descending</option>
                    </select>
                </label>
                <input type="submit">
            </td>
        </tr>
        </tfoot>
    </table>
</form>

<script>
    $(function () {
        $('#add').click(function () {
            let tr = $('<tr>');
            tr.append('<td><input type="text" name="first-name[]" required></td>');
            tr.append('<td><input type="text" name="second-name[]" required></td>');
            tr.append('<td><input type="email" name="email[]" required></td>');
            let lastTd = $('<td>');
            lastTd.append('<input type="number" name="exam-score[]" required>');
            let removeBtn = $('<button class="remove">-</button>').click(function () {
                tr.remove();
            });
            lastTd.append(removeBtn);
            tr.append(lastTd);
            tr.hide();
            $('#input-table>tbody').append(tr);
            tr.fadeIn();
        });

        $('#add').click();
    });
</script>

<?php
if (isset($_GET['first-name']) && isset($_GET['second-name']) && isset($_GET['email']) && isset($_GET['exam-score'])) {
    $firstNames = $_GET['first-name'];
    $secondNames = $_GET['second-name'];
    $emails = $_GET['email'];
    $examScores = $_GET['exam-score'];

    $students = [];
    for ($i = 0; $i < count($firstNames); $i++) {
        $students[] = [
            'firstName' => $firstNames[$i],
            'secondName' => $secondNames[$i],
            'email' => $emails[$i],
            'examScore' => $examScores[$i],
        ];
    }

    var_dump($students);
}
?>
</body>
</html>