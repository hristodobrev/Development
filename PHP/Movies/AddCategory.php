<?php
include 'app.php';

$error = '';

try {
    if (isset($_POST['add-category'])) {
        $stmt = $db->prepare('INSERT INTO categories (`name`, `notes`) VALUES (?, ?)');
        $stmt->execute([$_POST['name'], $_POST['notes']]);

        if ($stmt->errorCode() != '00000') {
            throw new Exception('An error has occurred while adding a new movie.');
        }
    }
} catch (Exception $exception) {
    $error = $exception->getMessage();
}

include 'AddCategory_frontend.php';