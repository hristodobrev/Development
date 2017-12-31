<?php

spl_autoload_register(function ($className) {
    require_once $className . '.php';
});

session_start();

$uri = $_SERVER['REQUEST_URI'];

$self = explode('/', $_SERVER['PHP_SELF']);
array_pop($self);
$replace = implode('/', $self);
$uri = str_replace($replace . '/', '', $uri);

$params = explode('/', $uri);

//$params = array_filter(explode('/', $uri), function($param) {
//    return trim($param) != '';
//});

if (count($params) > 1) {
    $controllerName = array_shift($params);
    $controllerName = ucfirst($controllerName);

    $actionName = array_shift($params);
} else {
    $controllerName = \Core\Config::DEFAULT_CONTROLLER;
    $actionName = \Core\Config::DEFAULT_ACTION;
}

$mvcContext = new \Core\Mvc\MvcContext($controllerName, $actionName, $params);
$session = new \Core\Session\Session();

$app = new \Core\Application($mvcContext, $session);

$app->registerDependency(\ViewEngine\ViewInterface::class, \ViewEngine\View::class);
$app->registerDependency(\Core\Session\SessionInterface::class, \Core\Session\Session::class);
$app->registerDependency(\Services\ServiceInterface::class, \Services\BaseService::class);
$app->registerDependency(\Services\User\UserServiceInterface::class, \Services\User\UserService::class);
//$app->registerDependency();

$app->start();