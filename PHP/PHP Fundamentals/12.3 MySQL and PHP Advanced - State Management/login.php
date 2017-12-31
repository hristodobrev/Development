<?php
require_once 'app.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$userLifecycle->userExists($username)) {
        throw new Exception('Username does not exist');
    }

    if($userLifecycle->getPassword($username) == $password) {
        $_SESSION['user'] = $username;
        header('Location: profile.php');
        exit;
    } else {
        throw new Exception('Invalid password');
    }
}

require_once 'login_frontend.php';