<?php /** @var $userLifecycle UserLifecycle */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Edit</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'header.php'; ?>
<main class="container">
    <form method="post" class="form col-md-4 col-md-offset-4">
        <fieldset>
            <legend>Delete Profile</legend>
            <p class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" value="<?= $user ?>"
                       class="form-control" disabled>
            </p>
            <p class="form-group">
                <label for="password">Pasword</label>
                <input id="password" type="password" name="password"
                       value="<?= $userLifecycle->getPassword($user); ?>"
                       class="form-control" disabled>
            </p>
            <p class="form-group">
                <label for="confirm">Confirm</label>
                <input id="confirm" type="password" name="confirm"
                       class="form-control" disabled>
            </p>
            <p class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?= $userLifecycle->getEmail($user); ?>"
                       class="form-control" disabled>
            </p>
            <p class="form-group">
                <label for="birthday">Birthday</label>
                <input id="birthday" type="text" name="birthday"
                       value="<?= $userLifecycle->getBirthday($user); ?>"
                       class="form-control" disabled>
            </p>
            <p class="form-group">
                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
            </p>
        </fieldset>
    </form>
</main>
</body>
</html>