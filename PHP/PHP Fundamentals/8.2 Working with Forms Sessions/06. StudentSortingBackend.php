<?php

session_start();

if (isset($_GET['submit'])) {
    $firstNames = $_GET['first_names'];
    $lastNames = $_GET['last_names'];
    $emails = $_GET['emails'];
    $examScores = $_GET['exam_scores'];

    $persons = isset($_SESSION['persons']) ? $_SESSION['persons'] : [];
    $totalScores = 0;
    for ($i = 0; $i < count($firstNames); $i++) {
        $persons[] = [
            'first_name' => $firstNames[$i],
            'last_name' => $lastNames[$i],
            'email' => $emails[$i],
            'exam_score' => intval($examScores[$i]),
        ];
        $totalScores += intval($examScores[$i]);
    }
    $averageScore = round($totalScores / count($persons));
    $_SESSION['average_score'] = $averageScore;

    usort($persons, function ($a, $b) {
        $sortBy = $_GET['sort_by'];
        return $a[$sortBy] > $b[$sortBy];
    });

    if ($_GET['order'] == 'descending') {
        $persons = array_reverse($persons);
    }

    $_SESSION['persons'] = $persons;

    $_SESSION['current_page'] = 1;
    $_SESSION['pages'] = intval(ceil(count($persons) / 5));
    $persons = getPersons();
}

if (isset($_GET['page'])) {
    $_SESSION['current_page'] = $_GET['page'];
    $persons = getPersons();
}

function getPersons() {
    $page = $_SESSION['current_page'];
    $start = ($page - 1) * 5;
    $end = $start + 5;
    $end = min(count($_SESSION['persons']), $end);

    $persons = [];
    for ($i = $start; $i < $end; $i++) {
        $persons[] = $_SESSION['persons'][$i];
    }

    return $persons;
}

include '06. StudentSorting.php';