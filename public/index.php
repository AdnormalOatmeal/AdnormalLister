<?php 

$frontController = explode("?", $_SERVER['REQUEST_URI']);

switch ($frontController[0]) {
	case '/ads/create':
		include 'ads.create.php';
		break;
	case '/ads/edit':
		include 'ads.edit.php ';
		break;
	case '/ads':
		include 'ads.index.php';
		break;
	case '/ads/show':
		include 'ads.show.php';
		break;
	case '/login':
		include 'auth.login.php';
		break;
	case '/user/create':
		include 'users.create.php';
		break;
	case '/user/edit':
		include 'users.edit.php';
		break;
	case '/user/show':
		include 'users.show.php';
		break;
	default:
		include 'home.php';
		break;
}

