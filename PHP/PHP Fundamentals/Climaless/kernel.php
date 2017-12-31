<?php

function parseRequest() : array
{
    $requestPath = $_SERVER['REQUEST_URI'];
    $requestPath = substr($requestPath, strlen('/' . APP_NAME . '/'));
    $requestParts = explode('/', $requestPath);
    if (count($requestParts) > 0 && $requestParts[0] != '') {
        $controllerName = $requestParts[0];
    } else {
        $controllerName = DEFAULT_CONTROLLER;
    }
    if (count($requestParts) > 1 && $requestParts[1] != '') {
        $actionName = $requestParts[1];
    } else {
        $actionName = DEFAULT_ACTION;
    }

    $params = array_splice($requestParts, 2);

    return [
        'controller' => $controllerName,
        'action' => $actionName,
        'params' => $params
    ];
}

function processRequest(array $parsedRequest)
{
    $controller = ucfirst(strtolower($parsedRequest['controller'])) . 'Controller';
    $action = $parsedRequest['action'];
    $params = $parsedRequest['params'];
    if (!class_exists($controller)) {
        die ("{$controller} does not exist");
    } else {
        $controller = new $controller();
    }

    if (!method_exists($controller, $action)) {
        die("Method {$action} does not exists.");
    } else {
        call_user_func_array(array($controller, $action), $params);
    }
}

function __autoload(string $class_name)
{
    if (file_exists("Controllers/$class_name.php")) {
        include "Controllers/$class_name.php";
    }

    if (file_exists("Models/$class_name.php")) {
        include "Models/$class_name.php";
    }
}