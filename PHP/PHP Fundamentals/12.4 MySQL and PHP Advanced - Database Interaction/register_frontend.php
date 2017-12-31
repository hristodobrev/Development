<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'header.php'; ?>
<main class="container">
    <form method="post" class="form col-md-4 col-md-offset-4">
        <fieldset>
            <legend>Register</legend>
            <p class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" class="form-control">
            </p>
            <p class="form-group">
                <label for="full-name">Full Name</label>
                <input id="full-name" type="text" name="full-name" class="form-control">
            </p>
            <p class="form-group">
                <label for="password">Pasword</label>
                <input id="password" type="password" name="password" class="form-control">
            </p>
            <p class="form-group">
                <label for="confirm">Confirm</label>
                <input id="confirm" type="password" name="confirm" class="form-control">
            </p>
            <p class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control">
            </p>
            <p class="form-group">
                <label for="birthday">Birthday</label>
                <input id="birthday" type="text" name="birthday" class="form-control">
            </p>
            <p class="form-group">
                <input type="submit" name="register" value="Register" class="btn btn-primary">
            </p>
        </fieldset>
    </form>
</main>
</body>
</html>