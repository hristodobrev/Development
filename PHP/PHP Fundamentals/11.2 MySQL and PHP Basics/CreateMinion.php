<?php
include 'app.php';

$towns = $db->query("SELECT * FROM towns")->fetchAll(PDO::FETCH_ASSOC);
$minions = $db->query("SELECT m.id AS id, m.name AS name, m.age AS age, t.name AS town FROM minions AS m INNER JOIN towns AS t ON m.town_id = t.id")->fetchAll(PDO::FETCH_ASSOC);
$error = '';

if (isset($_POST['create_minion'])) {
    try {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $town = $_POST['town'];

        if (strlen($name) < 1) {
            throw new Exception('Name cannot be empty.');
        }

        if (intval($age) < 1) {
            throw new Exception('Age cannot be negative or zero.');
        }

        $query = "INSERT INTO
	minions (
		`name`,
		`age`,
		`town_id`
	)
VALUES (
	?,
	?,
	?
)";

        $stmt = $db->prepare($query);
        $stmt->execute([
            $name,
            $age,
            $town
        ]);

        header('Refresh:0');
    } catch (Exception $exception) {
        $error = $exception->getMessage();
    }
}

if (isset($_POST['delete-db'])) {
    $stmt = $db->prepare("DROP DATABASE minions");
    $stmt->execute();

    header('Refresh:0');
}

if (isset($_POST['delete-minion-id'])) {
    $stmt = $db->prepare("DELETE FROM minions WHERE id = ?");
    $stmt->execute([$_POST['delete_minion_id']]);

    header('Refresh:0');
}

include 'CreateMinion_frontend.php';