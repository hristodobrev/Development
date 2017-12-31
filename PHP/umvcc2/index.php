<?php

require_once 'config.php';
require_once 'routes.php';

session_start();

$parsedRequest = parseRequest();
executeRequest($parsedRequest)

?>