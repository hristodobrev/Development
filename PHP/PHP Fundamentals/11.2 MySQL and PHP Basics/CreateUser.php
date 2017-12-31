<?php
include 'app.php';

$error = '';

if (isset($_POST['create_user'])) {
    try {
        $pictureInfo = $_FILES['picture'];
        var_dump($pictureInfo);

        if ($pictureInfo['size'] > 2000000) {
            throw new Exception('Picture size can be maximum 2MB.');
        }

        if ($pictureInfo['type'] != 'image/jpeg' && $pictureInfo != 'image/png') {
            throw new Exception('Picture type must be PNG or JPEG');
        }

        if (trim($_POST['password']) == '') {
            throw new Exception('Password must not be empty.');
        }

        if ($_POST['password'] != $_POST['confirm-password']) {
            throw new Exception('Password does not match.');
        }

        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $pictureName = uniqid() . '_' . $pictureInfo['name'];
        $tmpName = $pictureInfo["tmp_name"];
        move_uploaded_file($tmpName, "profile_pictures/$pictureName");

        $query = "INSERT INTO users (`username`, `password`, `profile_picture`) VALUES(?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$_POST['username'], $passwordHash, $pictureName]);
    } catch (Exception $exception) {
        $error = $exception->getMessage();
    }
}

include 'CreateUser_frontend.php';