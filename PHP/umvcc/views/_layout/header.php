<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
    <link rel="stylesheet" href="<?= APP_ROOT ?>/content/styles.css" type="text/css">
    <script src="<?= APP_ROOT ?>/content/jquery-3.0.0.min.js"></script>
    <script src="<?= APP_ROOT ?>/content/scripts.js"></script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="<?= APP_ROOT ?>/">Home</a></li>
        </ul>
        <ul class="right">
            <?php if (!$this->isLoggedIn) { ?>
                <li><a href="<?= APP_ROOT ?>/users/login">Login</a></li>
                <li><a href="<?= APP_ROOT ?>/users/register">Register</a></li>
            <?php } else { ?>
                <li>Hello, ickata</li>
                <li><a href="<?= APP_ROOT ?>/users/logout">Logout</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>

<?php require_once('show-notify-messages.php'); ?>