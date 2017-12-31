<?php
require_once 'app.php';

if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = '';
}

require_once 'error_frontend.php';