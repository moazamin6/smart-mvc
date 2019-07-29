<?php
/**
 * Created by PhpStorm.
 * User: moaza
 * Date: 7/28/2019
 * Time: 5:21 PM
 */

namespace Core\authentication;


use Core\session\Session;

trait Auth
{
    public static function id()
    {
        return Session::get('login_id', 'Id not found');
    }

    public static function check()
    {

        if (Session::get('login_id') != null) {
            return true;
        }
        return false;
    }

}