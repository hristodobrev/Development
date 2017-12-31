<?php
class DateModifier
{
    private $date1;
    private $date2;

    public function __construct($date1, $date2)
    {
        $this->date1 = new DateTime(str_replace(' ', '-', $date1));
        $this->date2 = new DateTime(str_replace(' ', '-', $date2));
    }

    public function getDifferenceInDays()
    {
        $timestampDifference = abs($this->date1->getTimestamp() - $this->date2->getTimestamp());

        return intval($timestampDifference / (60 * 60 * 24));
    }
}

$date1 = trim(fgets(STDIN));
$date2 = trim(fgets(STDIN));

$dateDiff = new DateModifier($date1, $date2);

echo $dateDiff->getDifferenceInDays();