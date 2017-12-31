<?php
session_start();
require_once 'UserLifecycle.php';

$userLifecycle = new \UserLifecycle();

set_exception_handler(function (Exception $exception) {
    $_SESSION['error'] = $exception->getMessage();
    header('Location: error.php');
    exit;
});

function authorize() {
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
}