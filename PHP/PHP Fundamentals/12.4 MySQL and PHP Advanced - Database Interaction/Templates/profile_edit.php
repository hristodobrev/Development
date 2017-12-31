<?php /** @var $data \DTO\ProfileEdit */ ?>
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
            <legend>Edit <?= $data->getUsername() ?>'s Profile</legend>
            <p class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" value="<?= $data->getUsername(); ?>"
                       class="form-control">
            </p>
            <p class="form-group">
                <label for="full-name">Full Name</label>
                <input id="full-name" type="text" name="full-name" value="<?= $data->getFullName(); ?>"
                       class="form-control">
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
                <label for="role">Role</label>
                <select id="role" type="text" name="role">
                    <?php foreach ($data->getRoles() as $role): ?>
                        <option value="<?= $role; ?>"
                            <?= $data->getRole() == $role ? 'selected' : ''; ?>
                        ><?= $role; ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p class="form-group">
                <input type="submit" name="edit" value="Edit" class="btn btn-primary">
            </p>
        </fieldset>
    </form>
</main>
</body>
</html>