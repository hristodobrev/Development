<?php
require_once 'app.php';

$_SESSION['error'] = isset($_SESSION['error']) ? $_SESSION['error'] : '';

$dto = new \DTO\Error($_SESSION['error']);

unset($_SESSION['error']);

\ViewEngine\Template::render('error', $dto);