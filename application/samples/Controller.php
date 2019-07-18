<?php
/**
 * Created by PhpStorm.
 * User.php: moaza
 * Date: 6/9/2019
 * Time: 10:56 AM
 */

// give namespace till folder name in which this file exist
namespace Application\Controllers;



use Core\SmartController;

class Controller extends SmartController
{

    public function __construct()
    {
        parent::__construct();
        //load models here
//        $this->loadModel('User');
    }
}