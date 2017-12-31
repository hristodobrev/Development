<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<main class="container">
    <h2 class="error"><?= $_SESSION['error']; ?></h2>
    <?php unset($_SESSION['error']); ?>
</main>
</body>
</html>