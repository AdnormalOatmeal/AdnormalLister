<?php 

session_start();
$sessionId = session_id();
$isLoggedIn = false;

require_once '../utils/Auth.php';
require_once '../utils/Input.php';
require_once '../database/ads_config.php';
require_once '../database/db_connect.php';
require_once '../models/BaseModel.php';