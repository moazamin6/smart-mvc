<?php
/**
 * Created by PhpStorm.
 * User: SiteAlive.pk
 * Date: 7/29/2019
 * Time: 9:34 PM
 */

namespace App\Controllers;

class HomeController
{

    public function index($req, $res)
    {

        var_dump($req);
        return 'this is home controllers';
    }
}