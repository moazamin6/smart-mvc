<?php
/**
 * Created by PhpStorm.
 * User: moaza
 * Date: 7/28/2019
 * Time: 11:23 PM
 */

namespace Core\Middleware;


use Core\Request;

interface SmartMiddleware
{
    public function handler(Request $request);
}