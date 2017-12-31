<style>
    table {
        border: 1px solid #000;
        border-spacing: 0;
    }

    thead th, thead td {
        border-bottom: 1px solid #000;
    }

    th, td {
        padding: 5px 10px;
    }

    a {
        color: mediumspringgreen;
        text-decoration: none;
    }

    .current-page {
        color: red;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(function () {
        $('#add_row').click(function () {
            var row = $(`<tr>
            <td><input type="text" name="first_names[]"></td>
            <td><input type="text" name="last_names[]"></td>
            <td><input type="text" name="emails[]"></td>
            <td>
                <input type="number" name="exam_scores[]">
                <input type="button" value="-" class="remove_row">
            </td>
        </tr>`);
            row.find('.remove_row').click(function () {
                row.remove();
            });
            $('tbody').append(row);
        });

        $('.remove_row').click(function (el) {
            $(el.target).parent().parent().remove();
        });
    });
</script>

<form method="get">
    <table>
        <thead>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Exam Score</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="text" name="first_names[]"></td>
            <td><input type="text" name="last_names[]"></td>
            <td><input type="text" name="emails[]"></td>
            <td>
                <input type="number" name="exam_scores[]">
                <input type="button" value="-" class="remove_row">
            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4">
                <input type="button" value="+" id="add_row">
                Sort by:
                <select name="sort_by">
                    <option value="first_name">First Name</option>
                    <option value="last_name">Last Name</option>
                    <option value="email">Email</option>
                    <option value="exam_score">Exam Score</option>
                </select>
                Order:
                <select name="order">
                    <option value="ascending">Ascending</option>
                    <option value="descending">Descending</option>
                </select>
                <input type="submit" name="submit">
            </td>
        </tr>
        </tfoot>
    </table>
</form>


<?php if (isset($persons)) : ?>
    <table>
        <thead>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Exam Score</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($persons as $person) : ?>
            <tr>
                <td><?= $person['first_name']; ?></td>
                <td><?= $person['last_name']; ?></td>
                <td><?= $person['email']; ?></td>
                <td><?= $person['exam_score']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="3">Average Score:</th>
            <th><?= isset($_SESSION['average_score']) ? $_SESSION['average_score']: ''; ?></th>
        </tr>
        <tr>
            <td>
                <?php if($_SESSION['current_page'] > 1) : ?>
                <a href="?page=<?= $_SESSION['current_page'] - 2; ?>">[Previous]</a>
                <?php endif; ?>

                <?php
                $startPage = max($_SESSION['current_page'] - 1, 1);
                $endPage = min($_SESSION['current_page'] + 2, $_SESSION['pages']);
                if($startPage == 1 && $_SESSION['pages'] > 2) {
                    $endPage = 5;
                }

                if($endPage == $_SESSION['pages'] && $_SESSION['pages'] > 2) {
                    $startPage = $_SESSION['pages'] - 4;
                }
                ?>
                <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                    <?php if ($_SESSION['current_page'] != $i) : ?>
                        <a href="?page=<?= $i ?>">[<?= $i ?>]</a>
                    <?php else: ?>
                        <span class="current-page">[<?= $i ?>]</span>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if($_SESSION['current_page'] < $_SESSION['pages']) : ?>
                <a href="?page=<?= $_SESSION['current_page'] + 1; ?>">[Next]</a>
                <?php endif; ?>
            </td>
        </tr>
        </tfoot>
    </table>
<?php endif; ?>
