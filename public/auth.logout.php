<?php 

require_once '../bootstrap.php';

Auth::logout();

header("Location: http://adnormallister.dev");
exit();