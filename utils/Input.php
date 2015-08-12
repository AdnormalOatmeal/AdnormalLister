<?php

class Input
{
	public static function has($key) {
		if (isset($_REQUEST[$key])) {
			return true;
		} else {
			return false;
		}
	}

	public static function get($key, $default = null)
	{
		if (!empty($_REQUEST[$key])) {
            return self::escape($_REQUEST[$key]);
        } else {
            return $default;
        }
	}

	public static function escape($input)
    {
        return htmlspecialchars(strip_tags($input));
    }

	// prevents class from being instantiated
	private function __construct() {}
}