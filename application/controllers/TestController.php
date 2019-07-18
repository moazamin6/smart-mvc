<?php
/**
 * Created by PhpStorm.
 * User: moaza
 * Date: 6/9/2019
 * Time: 10:56 AM
 */

namespace Application\Controllers;

use Application\Models\TestModel;
use Core\SmartController;

class TestController extends SmartController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        TestModel::all();
        $data = array(
            'name' => 'moaz',
            'age' => '25'
        );
        $this->loadView('cell/view', $data);
        //echo 'test controller index'.'<br>';
    }

    public function test()
    {

        echo 'test controller test function' . '<br>';
    }

    public function add()
    {

        echo 'this is add function from test controller' . '<br>';
    }
}