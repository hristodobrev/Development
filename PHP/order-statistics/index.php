<?php
spl_autoload_register(function ($className) {
    require_once $className . '.php';
});

require_once 'config.php';

$uri = $_SERVER['REQUEST_URI'];

$self = explode('/', $_SERVER['PHP_SELF']);
array_pop($self);
$replace = implode('/', $self);
$uri = str_replace($replace . '/', '', $uri);

$params = explode('/', $uri);
$controllerName = array_shift($params);
$controllerName = ucfirst($controllerName);
$actionName = array_shift($params);

$mvcContext = new \Core\Mvc\MvcContext($controllerName, $actionName, $params);

$app = new \Core\Application($mvcContext);

$app->registerDependency(\ViewEngine\ViewInterface::class, \ViewEngine\View::class);

$app->start();