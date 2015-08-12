<?php

require_once '../database/ads_config.php';
require_once '../database/db_connect.php';
require_once '../bootstrap.php';

class Auth {

		public static function attempt($password, $username, $dbc) {
		$select = "SELECT id FROM users WHERE user_name = :username AND password = :password";
		$stmt = $dbc->prepare($select);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

		$_SESSION["id"] = $stmt->fetchAll(PDO::FETCH_ASSOC);


		if (isset($_SESSION["id"])) {
			return true;
		} else {
			return false;
		}
	}
	public static function check() {
		if (isset($_SESSION["id"])) {
			return true;
		} else {
			return false;
		}
	}
	public static function user() {
		if (self::check()) {
			return $_SESSION["id"];
		}
	}
	public static function logout() {
		$_SESSION = array();
		session_destroy();
	}
}