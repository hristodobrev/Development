<?php
require_once 'app.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $userLifecycle->login($username, $password);
    if ($result) {
        $_SESSION['user'] = $username;
        header('Location: profile.php');
        exit;
    } else {
        throw new Exception('Invalid username or password');
    }
}

require_once 'login_frontend.php';