<?php
include 'app.php';

$error = '';

if (isset($_POST['register'])) {
    try {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        if ($password != $confirm) {
            throw new Exception('Passwords do not match');
        }

        $query = "INSERT INTO users(`username`, `password`) VALUES(?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$username, password_hash($password, PASSWORD_BCRYPT)]);
    } catch (Exception $exception) {
        $error = $exception->getMessage();
    }
}

include 'Register_frontend.php';