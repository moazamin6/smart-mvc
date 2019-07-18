<?php
/**
 * Created by PhpStorm.
 * User.php: moaza
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
        $this->loadModel('User');
    }

    public function index()
    {

        $data['users'] = TestModel::all();

        $this->loadView('cell/view', $data);
        //echo 'test controller index'.'<br>';
    }

    public function test($id)
    {

        smartPrint($id);
        echo 'test controller test function' . '<br>';
    }

    public function add($id, $age, $name)
    {

        smartPrint($id . ' -- ' . $age . ' -- ' . $name);
        echo 'this is add function from test controller' . '<br>';
    }

    public function display($item)
    {
        smartPrint($item);
    }
}