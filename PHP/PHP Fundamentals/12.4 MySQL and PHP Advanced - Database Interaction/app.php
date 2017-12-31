<?php
session_start();

spl_autoload_register(function ($className) {
    require_once $className . '.php';
});

\Driver\Database::setInstance(
    \Config\DbConfig::DB_HOST,
    \Config\DbConfig::DB_USER,
    \Config\DbConfig::DB_PASS,
    \Config\DbConfig::DB_NAME
);

/**
 * @var \Core\UserLifecycle $userLifecycle
 */
$userLifecycle = new \Core\UserLifecycle(\Driver\Database::getInstance(
    \Config\DbConfig::DB_HOST,
    \Config\DbConfig::DB_USER,
    \Config\DbConfig::DB_PASS,
    \Config\DbConfig::DB_NAME
));

function authorize()
{
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
}

set_exception_handler(function(Exception $exception){
    $_SESSION['error'] = $exception->getMessage();
    header('Location: error.php');
    exit;
});