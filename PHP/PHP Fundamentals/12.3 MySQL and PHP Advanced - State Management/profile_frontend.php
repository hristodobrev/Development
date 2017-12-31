<?php /** @var $userLifecycle UserLifecycle */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'header.php'; ?>
<main class="container">
    <h1>Hello <?= $userLifecycle->getFullName($_SESSION['user']); ?></h1>
    <?php if ($daysUntilBirthDay > 0): ?>
        <p>You have <?= $daysUntilBirthDay; ?> days until your birthday.</p>
    <?php elseif ($daysUntilBirthDay == 0): ?>
        <p>Happy birthday!</p>
    <?php else: ?>
        <p>Your birthday past <?= -$daysUntilBirthDay; ?> days ago.</p>
    <?php endif; ?>
</main>
</body>
</html>