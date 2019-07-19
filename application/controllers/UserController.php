<?php

// give namespace till folder name in which this file exist
namespace Application\Controllers;

use Application\Models\User;
use Core\SmartController;

class UserController extends SmartController
{

    public function __construct()
    {
        parent::__construct();
        //load models here

    }

    public function index()
    {
        $this->loadView('index');
    }

    public function list()
    {
        $data['users'] = User::all();
        $this->loadView('user_list', $data);
    }

    public function add()
    {
        $this->loadView('user_add');
    }

    public function addPost($post_values)
    {

        dd($post_values);
    }

    public function delete($id)
    {
        User::delete($id);
        redirectTo('user/list');
    }

    public function update($id)
    {
        redirectTo('/');
        smartPrint('update -- ' . $id);
    }

    public function postCheck($data)
    {
        echo '<pre>';
        print_r($data);
    }
}