<?php
require_once 'app.php';

authorize();

$daysUntilBirthDay = (new DateTime($userLifecycle->getBirthday($_SESSION['user'])))->format('z') - date('z');

require_once 'profile_frontend.php';