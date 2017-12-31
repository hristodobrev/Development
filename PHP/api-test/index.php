<?php

spl_autoload_register(function ($className) {
    require_once $className . '.php';
});

session_start();

$self = $_SERVER['PHP_SELF'];

$selfArr = explode('/', $self);
array_pop($selfArr);
$replace = implode('/', $selfArr) . '/';

$tokens = explode('/', str_replace($replace, '', $_SERVER['REQUEST_URI']));

$controllerName = $tokens[0];
if(!$tokens[0]) {
    header('Location: /api-test/home/index');
    die();
}
$className = 'Controllers' . DIRECTORY_SEPARATOR . ucfirst($tokens[0] . 'Controller');

if (count($tokens) > 1) {
	$actionName = $tokens[1];
} else {
    header('Location: /api-test/home/index');
    die();
}

$tokens = array_splice($tokens, 2);

$class = new $className($controllerName, $actionName);

try {
    if (method_exists($class, $actionName)) {
        echo call_user_func_array([$class, $actionName], $tokens);  
    } else {
        http_response_code(404);
        throw new \Exception("The url cannot be found");
    }
} catch (Exception $e) {
	echo json_encode(array(
		'error' => array(
            'msg' => $e->getMessage(),
            'code' => http_response_code(),
		)
	));
}

function generateAPIKey($length = 20) {
    $characters = '-=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}