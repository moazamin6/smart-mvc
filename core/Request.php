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
}