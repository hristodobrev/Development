<?php
require_once 'app.php';

authorize();

$user = $_SESSION['user'];

if (!$userLifecycle->isAdmin($user)) {
    throw new Exception('You have no access to this operation');
}

if (isset($_GET['user'])) {
    $user = $_GET['user'];
}

if (isset($_POST['edit'])) {
    $result = $userLifecycle->editProfile($user, $_POST, $_SESSION);
    if ($result) {
        header('Location: users.php');
        exit;
    }
}

$email = $userLifecycle->getEmail($user);
$birthday = $userLifecycle->getBirthday($user);
$fullName = $userLifecycle->getfull_name($user);
$role = $userLifecycle->getRole($user);
$dto = new \DTO\ProfileEdit($user, $email, $birthday, $fullName, $role);

\ViewEngine\Template::render('profile_edit', $dto);