<!doctype html>
<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
    <title>User Profile</title>
    <script>
        $(function () {
            $('.alert>.close').click(function (element) {
                $(element.target).parent().fadeOut();
            });
        });
    </script>
    <style>
        .user-pic {
            height: 1.5em;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if ($error != '') : ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error! </strong> <?= $error; ?>
        </div>
        <?php
        $error = '';
    endif; ?>
    <div class="row">
        <h3>
            <img src="profile_pictures/<?= $userInfo['profile_picture']; ?>" class="user-pic" alt="Profile Picture">
            Welcome, <?= $userInfo['username']; ?>
            <a href="Logout.php" class="btn btn-xs btn-danger pull-right">Logout</a>
        </h3>
    </div>
</div>
</body>
</html>