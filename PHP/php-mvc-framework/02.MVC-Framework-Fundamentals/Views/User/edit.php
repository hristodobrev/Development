<?php /** @var \Models\View\ProfileEditViewModel $model */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
</head>
<body>
<p>Id: <?= $model->getId(); ?></p>
<p>Username: <?= $model->getUsername(); ?></p>
<p>Email: <?= $model->getEmail(); ?></p>
<p>Password: <?= $model->getPassword(); ?></p>
<p>Birthday: <?= $model->getBirthday(); ?></p>
<!--<form method="post">-->
<!--    <p>-->
<!--        <label>-->
<!--            Username:-->
<!--            <input type="text">-->
<!--        </label>-->
<!--    </p>-->
<!--    <p>-->
<!--        <label>-->
<!--            Email:-->
<!--            <input type="text">-->
<!--        </label>-->
<!--    </p>-->
<!--    <p><input type="submit" value="Edit"></p>-->
<!--</form>-->
</body>
</html>