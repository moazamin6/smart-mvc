<?php
/**
 * Created by PhpStorm.
 * User.php: moaza
 * Date: 6/9/2019
 * Time: 2:39 PM
 */

namespace Core;


class Request
{

    private static $instance;

    public function __construct()
    {
    }

    public function parametersToRequest($parameters)
    {
        $reqObj = new Request();
        foreach ($parameters as $key => $value) {
            $reqObj->$key = $value;
        }
        return $reqObj;
    }

    public static function getRequestInstance($parameters = array())
    {

        if (self::$instance == null) {
            self::$instance = new Request();
        }

        if ($parameters != null) {
            foreach ($parameters as $key => $value) {
                self::$instance->$key = $value;
            }
        }

        return self::$instance;
    }
}