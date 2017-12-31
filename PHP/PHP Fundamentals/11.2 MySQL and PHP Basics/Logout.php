<?php
include 'app.php';

session_destroy();

header('Location: login.php');