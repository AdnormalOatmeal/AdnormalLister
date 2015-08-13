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
	case '/logout':
		include 'auth.logout.php';
		break;
	case '/signup':
		include 'users.create.php';
		break;
	case '/users/edit':
		include 'users.edit.php';
		break;
	case '/users/show':
		include 'users.show.php';
		break;
	default:
		include 'home.php';
		break;
}

