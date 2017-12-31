<?php
include 'app.php';

$error = '';

try {

    $stmt = $db->prepare('SELECT * FROM directors');
    $stmt->execute();
    $directors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $db->prepare('SELECT * FROM genres');
    $stmt->execute();
    $genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $db->prepare('SELECT * FROM categories');
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST['add-movie'])) {
        $title = $_POST['title'];
        $director_id = $_POST['director'];
        $genre_id = $_POST['genre'];
        $category_id = $_POST['category'];
        $length = $_POST['length'];
        $copyrightYear = $_POST['copyright-year'];
        $rating = $_POST['rating'];
        $notes = $_POST['notes'];

        $query = 'INSERT INTO movies (`title`, `director_id`, `genre_id`, `category_id`, `length`, `copyright_year`, `rating`, `notes`)
VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $db->prepare($query);
        $stmt->execute([
            $title,
            $director_id,
            $genre_id,
            $category_id,
            $length,
            $copyrightYear,
            $rating,
            $notes
        ]);

        if ($stmt->errorCode() != '00000') {
            throw new Exception('An error has occurred while adding a new movie.');
        }
    }
} catch (Exception $exception) {
    $error = $exception->getMessage();
}

include 'AddMovie_frontend.php';