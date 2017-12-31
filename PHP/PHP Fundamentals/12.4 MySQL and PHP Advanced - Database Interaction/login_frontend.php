<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'header.php'; ?>
<main class="container">
    <form method="post" class="form col-md-4 col-md-offset-4">
        <fieldset>
            <legend>Login</legend>
            <p class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" class="form-control">
            </p>
            <p class="form-group">
                <label for="password">Pasword</label>
                <input id="password" type="password" name="password" class="form-control">
            </p>
            <p class="form-group">
                <input type="submit" name="login" value="Login" class="btn btn-primary">
            </p>
        </fieldset>
    </form>
</main>
</body>
</html>