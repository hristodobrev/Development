<?php

include 'app.php';

$stmt = $db->prepare('SELECT * FROM minions');
$stmt->execute();

$minions = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($minions);