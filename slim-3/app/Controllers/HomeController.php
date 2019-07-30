<?php
/**
 * Created by PhpStorm.
 * User: SiteAlive.pk
 * Date: 7/29/2019
 * Time: 9:34 PM
 */

namespace App\Controllers;



class HomeController extends Controller
{

    public function index($req, $res)
    {

        return $this->view->render($res,'home.twig');

    }
}