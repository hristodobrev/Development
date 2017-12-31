<?php
include 'app.php';

$error = '';

try {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $db->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->execute([$username]);

        $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        if($userInfo) {
            if (password_verify($password, $userInfo['password'])) {
                $_SESSION['user_id'] = $userInfo['id'];
                $db->prepare("UPDATE users SET last_login_time = NOW() WHERE id = ?")->execute([$userInfo['id']]);

                header('Location: ' .  'userprofile.php');
            } else {
                throw new Exception('Password is invalid.');
            }
        } else {
            throw new Exception('User does not exist.');
        }
    }
} catch (Exception $exception) {
    $error = $exception->getMessage();
}

include 'Login_frontend.php';