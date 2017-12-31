<?php
$date = getdate();
$remainingDays = 365 - $date['yday'];
$hours = $date['hours'];
$minutes = $date['minutes'];
$seconds = $date['seconds'];
$secondsToNextDay = 24 * 60 * 60 - $hours * $minutes * $seconds;
$remHours = 24 - $hours;
$remMinutes = 60 - $minutes;
$remSeconds = 60 - $seconds;
$hoursUntilNextYear = ($remainingDays * 24) + 24 - $hours;
$minutesUntilNextYear = $hoursUntilNextYear * 60 + (60 - $minutes);
$secondsUntilNextYear = $minutesUntilNextYear * 60 + (60 - $seconds);
echo "Hours until next year: {$hoursUntilNextYear}<br>";
echo "Minutes until next year: {$minutesUntilNextYear}<br>";
echo "Seconds until next year: {$secondsUntilNextYear}<br>";
echo "Days:Hours:Minutes:Seconds {$remainingDays}:{$remHours}:{$remMinutes}:{$remSeconds}";