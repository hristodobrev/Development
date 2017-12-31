<?php
require_once 'app.php';

if (isset($_POST['register'])) {
    if ($_POST['password'] != $_POST['confirm']) {
        throw new Exception('Password mismatch');
    }

    if (trim($_POST['username']) == '') {
        throw new Exception('Username must not be empty');
    }

    if (trim($_POST['password']) == '') {
        throw new Exception('Password must not be empty');
    }

    if (trim($_POST['email']) == '') {
        throw new Exception('Email must not be empty');
    }

    if (trim($_POST['birthday']) == '') {
        throw new Exception('Birthday must not be empty');
    }

    if (trim($_POST['full-name']) == '') {
        throw new Exception('Full name must not be empty');
    }

    $result = $userLifecycle->register(
        $_POST['username'],
        $_POST['password'],
        $_POST['email'],
        new DateTime($_POST['birthday']),
        $_POST['full-name']
    );
    if ($result) {
        header('Location: login.php');
        exit;
    }
}

require_once 'register_frontend.php';