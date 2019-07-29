<?php
/**
 * Created by PhpStorm.
 * User: moaza
 * Date: 7/28/2019
 * Time: 11:29 PM
 */

namespace Application\Middleware;


use Core\authentication\Auth;
use Core\Middleware\SmartMiddleware;
use Core\Request;

class TestMiddleware implements SmartMiddleware
{

    public function handler(Request $request)
    {

        if (!Auth::check()) {

            //echo 'this is handler';
            return redirectTo('user/list');
        }
    }
}