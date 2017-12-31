<?php /** @var \DTO\Profile $data */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'header.php'?>
<div class="container">
    <form method="post" class="form-horizontal">
        <fieldset>
            <legend>Edit Profile</legend>
            <p class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" value="<?= $data->getUsername(); ?>"
                       class="form-control">
            </p>
            <p class="form-group">
                <label for="password">Pasword</label>
                <input id="password" type="password" name="password"
                       class="form-control">
            </p>
            <p class="form-group">
                <label for="confirm">Confirm</label>
                <input id="confirm" type="password" name="confirm" class="form-control">
            </p>
            <p class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?= $data->getEmail(); ?>" class="form-control">
            </p>
            <p class="form-group">
                <label for="birthday">Birthday</label>
                <input id="birthday" type="text" name="birthday"
                       value="<?= $data->getBirthday(); ?>" class="form-control">
            </p>
            <p class="form-group">
                <input type="submit" name="edit" value="Edit" class="btn btn-primary">
            </p>
        </fieldset>
    </form>
</div>
</body>
</html>