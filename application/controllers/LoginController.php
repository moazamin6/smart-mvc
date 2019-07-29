<?php


namespace Application\Controllers;


use Core\Request;
use Core\SmartController;

class LoginController extends SmartController
{
    public function __construct()
    {
        $this->middleware('TestMiddleware');
    }

    public function login()
    {

        $this->loadView('login');
    }

    public function loginPost(Request $request)
    {
        d(Request::getRequestInstance());
        dd($request);
    }

    public function home()
    {
        $this->loadView('home');
    }
}