<?php
require_once 'app.php';

authorize();

if (!$userLifecycle->isAdmin($_SESSION['user'])) {
    throw new Exception('You have no access to this operation');
}

if (!isset($_GET['user']) || !$userLifecycle->userExists($_GET['user'])) {
    throw new Exception('User does not exist');
}

$user = $_GET['user'];

if (isset($_POST['delete'])) {
    $result = $userLifecycle->delete($_GET['user']);
    if ($result) {
        header('Location: profile.php');
        exit;
    }
}

require_once 'profile_delete_frontend.php';