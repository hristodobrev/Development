<?php
require_once 'app.php';
session_destroy();

header('Location: login.php');
exit;