<?php
include '../app.php';
$error = '';

try {

    $moviesQuery = "SELECT m.id, title, d.name AS director, copyright_year, length, g.name AS genre, 
c.name AS category, rating, m.notes FROM movies AS m
JOIN directors AS d ON m.director_id = d.id
JOIN categories AS c ON	m.category_id = c.id
JOIN genres AS g ON m.genre_id = g.id
WHERE is_deleted IS NULL";


    $stmt = $db->prepare($moviesQuery);
    $stmt->execute();
    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt->errorCode() != '00000') {
        throw new Exception('An error has occurred while adding a new movie.');
    }

    if (isset($_POST['delete-movie'])) {
        $query = 'UPDATE movies SET is_deleted = NOW() WHERE id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute([$_POST['id']]);

        header('Refresh:0');

        if ($stmt->errorCode() != '00000') {
            throw new Exception('An error has occurred while adding a new movie.');
        }
    }
} catch (Exception $exception) {
    $error = $exception->getMessage();
}
include 'Movies_frontend.php';