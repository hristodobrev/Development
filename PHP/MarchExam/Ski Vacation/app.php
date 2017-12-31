<?php
session_start();

spl_autoload_register(function ($className) {
    require_once $className . '.php';
});

include 'config.php';

$db = new \Driver\PDODatabase(DB_HOST, DB_NAME, DB_USER, DB_PASS);

$templateEngine = new \TemplateEngine\TemplateEngine();