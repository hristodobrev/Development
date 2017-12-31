<?php
require_once 'app.php';

authorize();

if (!empty($_POST)) {
    $result = $userLifecycle->edit($_SESSION['user'], $_POST, $_SESSION);
    if ($result) {
        header('Location: profile.php');
        exit;
    }
}

$username = $_SESSION['user'];
$password = $userLifecycle->getPassword($username);
$email = $userLifecycle->getEmail($username);
$birthday = $userLifecycle->getBirthday($username);
$dto = new \DTO\Profile($username, $password, $email, $birthday);

\ViewEngine\Template::render('profile', $dto);