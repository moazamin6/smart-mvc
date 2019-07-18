<?php

// give namespace till folder name in which this file exist
namespace Application\Controllers;

use Core\SmartController;

class UserController extends SmartController
{

    public function __construct()
    {
        parent::__construct();
        //load models here
//        $this->loadModel('User');
    }

    public function index()
    {
        $data = 'moaz amin';
        $this->loadView('inc/header');
        $this->loadView('home', $data);
        $this->loadView('inc/footer');
    }

    public function home()
    {

        smartPrint('this is home');
    }
}