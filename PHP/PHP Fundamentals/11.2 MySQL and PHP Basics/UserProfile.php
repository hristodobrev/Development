<?php
include 'app.php';

$error = '';

try {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
    }

    $stmt = $db->prepare('SELECT username, profile_picture FROM users WHERE id = ?');
    $stmt->execute([$_SESSION['user_id']]);
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $exception) {
    $error = $exception->getMessage();
}

include 'UserProfile_frontend.php';