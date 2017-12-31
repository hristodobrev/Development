<?php /** @var $userLifecycle UserLifecycle */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php include 'header.php'; ?>
<main class="container">
    <h2>Users</h2>
    <table class="table">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Full Name</th>
            <th>Birthday</th>
            <?php if ($userLifecycle->isAdmin($_SESSION['user'])): ?>
                <th colspan="3">Admin Actions</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($userLifecycle->getUsers() as $user): ?>
            <tr>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['full_name']; ?></td>
                <td><?= $user['birthday']; ?></td>
                <?php if ($userLifecycle->isAdmin($_SESSION['user'])): ?>
                    <td>
                        <a href="profile_edit.php?user=<?= $user['username']; ?>">Edit</a>
                    </td>
                    <td>
                        <a href="profile_delete.php?user=<?= $user['username']; ?>">Delete</a>
                    </td>
                    <td>
                        <?php if (!$userLifecycle->isAdmin($user['username'])): ?>
                            <a href="profile_promote.php?user=<?= $user['username']; ?>">Promote to Admin</a>
                        <?php else: ?>
                            <a href="profile_demote.php?user=<?= $user['username']; ?>">Demote to User</a>
                        <?php endif; ?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>