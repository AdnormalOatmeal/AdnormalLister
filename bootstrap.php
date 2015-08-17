<?php 

session_start();
$sessionId = session_id();
$isLoggedIn = false;

$_ENV = include '.env.php';
require_once '../database/db_connect.php';

require_once '../utils/Auth.php';
require_once '../utils/Input.php';
require_once '../models/BaseModel.php';
require_once '../models/Ad.php';
require_once '../models/User.php';