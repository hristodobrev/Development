<?php

$input = explode(',', trim(fgets(STDIN)));

echo getXML($input);

function getXML($questionsAndAnswers)
{
    $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $xml .= "<quiz>\n";

    for ($i = 0; $i < count($questionsAndAnswers); $i += 2) {
        $question = trim($questionsAndAnswers[$i]);
        $answer = trim($questionsAndAnswers[$i + 1]);

        $xml .= "  <question>\n";
        $xml .= "    {$question}\n";
        $xml .= "  </question>\n";
        $xml .= "  <answer>\n";
        $xml .= "    {$answer}\n";
        $xml .= "  </answer>\n";
    }

    $xml .= "</quiz>\n";

    return $xml;
}