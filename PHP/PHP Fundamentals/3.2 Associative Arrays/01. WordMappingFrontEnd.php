<!doctype html>
<html lang="en">
<head>
    <title>Word Mapping</title>
</head>
<body>
<form method="GET">
    <p>
        <textarea name="input" cols="50" rows="2"></textarea>
    </p>
    <p>
        <input type="submit" value="Count Words">
    </p>
</form>
<?php if (isset($wordCounts)) : ?>
    <table border="2">
        <?php foreach ($wordCounts as $word => $count) : ?>
            <tr>
                <td><?= $word ?></td>
                <td><?= $count ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
</body>
</html>