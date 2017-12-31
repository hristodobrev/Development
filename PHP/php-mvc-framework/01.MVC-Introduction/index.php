<?php
$uri = $_SERVER['REQUEST_URI'];

$self = explode('/', $_SERVER['PHP_SELF']);
array_pop($self);
$replace = implode('/', $self);
$uri = str_replace($replace . '/', '', $uri);
$params = explode('/', $uri);

$controllerName = array_shift($params);

$controllerName = ucfirst($controllerName) . 'Controller';

$actionName = array_shift($params);

$controller = new $controllerName();
$controller->$actionName();

class HomeController
{
    public function index()
    {
        echo 'Hello to index';
    }
}

class UserController
{
    public function login()
    {
        echo 'Login page';
    }

    public function register()
    {
        echo 'Register page';
    }
}