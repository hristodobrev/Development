<?php
require_once('config.php');
require_once('kernel.php');
session_start();

$parsedRequest = parseRequest();
processRequest($parsedRequest);
