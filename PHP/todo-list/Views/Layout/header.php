<?php $appName = \Core\Config::APP_NAME; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>-->

    <script src="/<?= $appName ?>/public/js/jquery.min.js"></script>
    <script src="/<?= $appName ?>/public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/<?= $appName ?>/public/css/bootstrap.min.css"/>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/<?= $appName ?>" class="navbar-brand">Todo List</a>
        </div>
        <div class="collapse navbar-collapse" id="header-menu">
            <?php if ($this->isLoggedIn()): ?>
                <ul class="nav navbar-nav">
                    <li><a href="/<?= $appName ?>/home/index">Home</a></li>
                    <li><a href="/<?= $appName ?>/projects/all">My Projects</a></li>
                    <li><a href="/<?= $appName ?>/user/logout">Logout</a></li>
                </ul>
            <?php else: ?>
                <ul class="nav navbar-nav">
                    <li><a href="/<?= $appName ?>/user/login">Login</a></li>
                    <li><a href="/<?= $appName ?>/user/register">Register</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>

<?php foreach ($this->getErrors() as $error) : ?>
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> <?= $error ?>
    </div>
<?php endforeach; $this->clearErrors(); ?>

<main class="container">