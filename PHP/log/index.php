<?php

spl_autoload_register(function($class_name){
	require_once 'controllers/' . $class_name . '.php';
});

$uri = $_SERVER['REQUEST_URI'];

$self = $_SERVER['PHP_SELF'];
$self = explode('/', $self);
array_pop($self);
$self = implode('/', $self);

$tokens = explode('/', str_replace($self . '/', '', $uri));

$controllerName = ucfirst(array_shift($tokens)) . 'Controller';
$actionName = array_shift($tokens);	
$params = $tokens;

$controller = new $controllerName();

call_user_func_array([$controller, $actionName], $params);

?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" />
	<title>Log</title>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="/log">Log</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li><a href="/log/exceptions">Exceptions</a></li>
	    </ul>
	  </div>
	</nav>
</body>
</html>