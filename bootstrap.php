<?php 

session_start();
$sessionId = session_id();
$isLoggedIn = false;

require_once '../utils/Auth.php';
require_once '../utils/Input.php';