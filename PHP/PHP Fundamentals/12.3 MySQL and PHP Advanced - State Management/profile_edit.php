<?php
require_once 'app.php';

authorize();

$user = $_SESSION['user'];

if (isset($_GET['user'])) {
    if (!$userLifecycle->isAdmin($user)) {
        throw new Exception('You have no access to this operation');
    }

    $user = $_GET['user'];
}

if (isset($_POST['edit'])) {
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    if ($password != $confirm) {
        throw new Exception('Password mismatch');
    }

    if (trim($password) == '') {
        throw new Exception('Password must not be empty');
    }

    $result = $userLifecycle->edit($user, $_POST, $_SESSION);
    if ($result) {
        header('Location: profile.php');
        exit;
    }
}

require_once 'profile_edit_frontend.php';