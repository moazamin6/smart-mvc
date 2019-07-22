<?php

// give namespace till folder name in which this file exist
namespace Application\Controllers;

use Application\Models\User;
use Core\Request;
use Core\SmartController;

class UserController extends SmartController
{

    public function index()
    {
        $this->loadView('index');
    }

    public function list()
    {
        //dd(User::where(['name' => 'admin', 'email' => 'moazamin6@gmail.com'])->delete());

        //User::where(['id' => '1'])->update(['name' => 'mmm']);
        $data['users'] = User::all();
        $this->loadView('user_list', $data);
    }

    public function add()
    {
        $this->loadView('user_add');
    }

    public function addPost(Request $request)
    {

        User::insert([
            'name' => $request->username,
            'age' => $request->age,
            'country' => $request->country,
            'education' => $request->education,
            'email' => $request->email,
        ]);
        redirectTo('user/list');
        //dd($post_values);
    }

    public function delete($id)
    {
        User::where(['id' => $id])->delete();
        redirectTo('user/list');
    }

    public function update($id)
    {
        $data = User::find($id);
        //User::where(['name' => 'waqas', 'email' => 'test@gmail.com'])->update([]);
        $this->loadView('update_user', $data);
    }

    public function update_post(Request $request)
    {
        //dd($request);
        User::where(['id' => $request->user_id])->update([
            'name' => $request->username,
            'age' => $request->age,
            'country' => $request->country,
            'education' => $request->education,
            'email' => $request->email
        ]);
        redirectTo('user/list');
    }
}