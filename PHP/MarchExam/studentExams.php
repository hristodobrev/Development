<?php

if (isset($_GET['string'])) {
    $exams = [];
    $entries = explode(',', $_GET['string']);
    foreach ($entries as $entry) {
        $entry = trim($entry);
        $nameExamToken = explode('-', $entry);
        $examScoreToken = explode(':', $nameExamToken[1]);

        $name = trim($nameExamToken[0]);
        $exam = trim($examScoreToken[0]);
        $score = intval($examScoreToken[1]);

        if ($score < 0 || $score > 400) {
            continue;
        }

        if (!array_key_exists($exam, $exams)) {
            $exams[$exam] = [];
        }

        if (array_key_exists($name, $exams[$exam])) {
            if ($exams[$exam][$name]['score'] < $score) {
                $exams[$exam][$name]['score'] = $score;
            }

            $exams[$exam][$name]['makeup']++;
        } else {
            $exams[$exam][$name] = [
                'name' => $name,
                'score' => $score,
                'makeup' => 0
            ];
        }
    }

    $result = '<table>'.PHP_EOL;
    $result .= '<tr><th>Subject</th><th>Name</th><th>Result</th><th>MakeUpExams</th>' . PHP_EOL;

    foreach ($exams as $examName => $exam) {
//        var_dump($exam);
        usort($exam, function($a, $b){
            if ($a['score'] != $b['score']) {
                return $a['score'] < $b['score'];
            } else if ($a['makeup'] != $b['makeup']) {
                return $a['makeup'] > $b['makeup'];
            } else {
                return $a['name'] > $b['name'];
            }
        });

        foreach ($exam as $studentName => $examEntries) {
            $result .= '<tr>';
            $result .= "<td>{$examName}</td><td>{$examEntries['name']}</td><td>{$examEntries['score']}</td><td>{$examEntries['makeup']}</td>";
            $result .= '</tr>' . PHP_EOL;
        }
    }

    $result .= '</table>';

    echo $result;
}

include '03. Student Exams_HTML.html';