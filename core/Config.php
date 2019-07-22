<?php
/**
 * Created by PhpStorm.
 * User: moaza
 * Date: 7/20/2019
 * Time: 6:53 PM
 */

namespace Core;


class Config
{
    public static function get($key='')
    {
        $config = include '../config/config.php';

        if($key==''){
            return $config;
        }
        if (array_key_exists($key, $config)) {

            return $config[$key];
        } else {
            return 'value not exist';
        }
    }
}