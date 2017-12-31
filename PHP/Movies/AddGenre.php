<?php
include 'app.php';

$error = '';
try {
    if (isset($_POST['add-genre'])) {
        $stmt = $db->prepare('INSERT INTO genres (`name`, `notes`) VALUES (?, ?)');
        $stmt->execute([$_POST['name'], $_POST['notes']]);
        if ($stmt->errorCode() != '00000') {
            throw new Exception('An error has occurred while adding a new movie.');
        }
    }
} catch (Exception $exception) {
    $error = $exception->getMessage();
}

include 'AddGenre_frontend.php';