<?php

function parseRequest() : array
{
    $requestPath = $_SERVER['REQUEST_URI'];
    $requestPath = substr($requestPath, strlen(APP_ROOT));
    $requestParts = explode('/', $requestPath);

    $controller = DEFAULT_CONTROLLER;
    if (count($requestParts) >= 2 && $requestParts[1] != '') {
        $controller = $requestParts[1];
    }

    $action = DEFAULT_ACTION;
    if (count($requestParts) >= 3 && $requestParts[2] != '') {
        $action = $requestParts[2];
    }

    $params = array_slice($requestParts, 3);

    $parsedRequest = [
        'controller' => $controller,
        'action' => $action,
        'params' => $params
    ];

    return $parsedRequest;
}

function executeRequest(array $parsedRequest)
{
    $controller = $parsedRequest['controller'];
    $action = $parsedRequest['action'];
    $controllerClassName = ucfirst(strtolower($controller) . 'Controller');
    if (class_exists($controllerClassName)) {
        $controller = new $controllerClassName($controller, $action);
    } else {
        $controllerFileName = 'controllers/' . $controllerClassName . '.php';
        die('Cannot find controller ' . $controller . ' in class '. $controllerFileName . '.');
    }

    if (method_exists($controller, $action)) {
        $params = $parsedRequest['params'];
        call_user_func_array(array($controller, $action), $params);
        $controller->renderView();
    } else {
        die("Cannot find action $action in controller $controllerClassName.");
    }
}

function __autoload(string $class_name)
{
    if (file_exists("controllers/$class_name.php")) {
        include "controllers/$class_name.php";
    }

    if (file_exists("models/$class_name.php")) {
        include "models/$class_name.php";
    }
}

?>