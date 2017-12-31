<?php

function parseRequest()
{
    $url = $_SERVER['REQUEST_URI'];
    $requestParts = explode('/', $url);
    if ($requestParts[1] != substr(APP_ROOT, 1)) {
        die ('Invalid app root!');
    }

    $requestParts = array_splice($requestParts, 2);

    $controller = DEFAULT_CONTROLLER;
    if (count($requestParts) > 0 && $requestParts[0] != '') {
        $controller = $requestParts[0];
    }

    $action = DEFAULT_ACTION;
    if (count($requestParts) > 1 && $requestParts[1] != '') {
        $action = $requestParts[1];
    }

    $params = array_slice($requestParts, 2);

	$result = [
        'controller' => $controller,
        'action' => $action,
        'params' => $params
    ];
	
    return $result;
}

function executeRequest($parsedRequest)
{
    $controller = $parsedRequest['controller'];
    $action = $parsedRequest['action'];
    $params = $parsedRequest['params'];

    $controllerClassName = ucfirst(strtolower($controller)) . 'Controller';
    if (class_exists($controllerClassName)) {
        $controller = new $controllerClassName($controller, $action);
    } else {
        die("Controller $controllerClassName does not exist.");
    }

    if (method_exists($controller, $action)) {
        call_user_func_array(array($controller, $action), $params);
        $controller->renderView();
    } else {
        die("Action $action does not exist.");
    }
}

function __autoload(string $className)
{
    if (file_exists("controllers/$className.php")) {
        include "controllers/$className.php";
    }

    if (file_exists("models/$className.php")) {
        include "models/$className.php";
    }
}

?>