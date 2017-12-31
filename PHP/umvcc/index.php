<?php

require_once("routingFunctions.php");
require_once("config.php");

session_start();

$parsedRequest = parseRequest();
executeRequest($parsedRequest);

?>