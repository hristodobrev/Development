<?php
session_start();

include 'config.php';
include 'db.php';

function authorize()
{
    if (!isset($_SESSION['user'])) {
        throw new Exception('Access denied');
    }
}