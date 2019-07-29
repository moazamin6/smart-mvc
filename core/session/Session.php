<?php
/**
 * Created by PhpStorm.
 * User: moaza
 * Date: 7/28/2019
 * Time: 4:55 PM
 */

namespace Core\Session;


class Session
{
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default_value = null)
    {
        if (self::hasSession($key)) {
            return $_SESSION[$key];
        }
        return $default_value;
    }

    public static function getAll(): array
    {
        return $_SESSION;
    }

    public static function flush()
    {
        $_SESSION = array();
    }

    public static function hasSession($key)
    {
        if (isset($_SESSION[$key])) {
            return true;
        } else {
            return false;
        }
    }
}