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

    public static function getString($key, $min = 1, $max = 255)
    {
        $value = trim(static::get($key));

        if (!is_string($key)) {
            throw new InvalidArgumentException("$key must be a string");
        }

        if (!is_numeric($min) ||
            !is_numeric($max)) {
            throw new InvalidArgumentException('$min and $max must be numbers');
        }

        if (!isset($value)) {
            throw new OutOfRangeException("$key cannot be null");
        }

        if (!is_string($value)) {
            throw new DomainException("$key must be a string");
        }

        if (strlen(static::get($key)) < $min ||
            strlen(static::get($key)) > $max) {

            throw new LengthException('Entry cannot be left blank, nor exceed character limit');
        }

        return $value;

    }

    public static function getNumber($key, $min = 0, $max = 1000)
    {
        $value = str_replace(',', '', static::get($key));

        if (!is_string($key)) {
            throw new InvalidArgumentException("$key must be a string");
        }

        if (!is_numeric($min) ||
            !is_numeric($max)) {
            throw new InvalidArgumentException('$min and $max must be numbers');
        }

        if (!isset($value)) {
            throw new OutOfRangeException("$key cannot be null");
        }

        if (!is_numeric($value)) {
            throw new DomainException("$key must be a number");
        }

        if (static::get($key) < $min ||
            static::get($key) > $max) {
            throw new RangeException("$key must be a number between $min and $max.");
        }

        return $value;

    }

    public static function getDate($key, $format = 'Y-m-d')
    {
        $value = static::get($key);

        $dateObject = new DateTime($value);

        if ($dateObject) {
            $dateString = $dateObject->format($format);
            return $dateString;
        } else {
            throw new Exception("Please ensure you are inputting a valid date format: mm/dd/yyyy:");
        }
    }
    
	// prevents class from being instantiated
	private function __construct() {}
}