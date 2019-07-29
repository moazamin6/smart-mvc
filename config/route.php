<?php

/*
 *  use $route variable and call setRoute function to define routes
 *
 * */

$route->setRoute('/', 'UserController@index');
$route->setRoute('login', 'LoginController@login');
$route->setRoute('login-post', 'LoginController@loginPost');
$route->setRoute('home', 'LoginController@home');
$route->setRoute('user/list', 'UserController@list');
$route->setRoute('user/add', 'UserController@add');
$route->setRoute('user/add_post', 'UserController@addPost');
$route->setRoute('user/delete/{id}', 'UserController@delete');
$route->setRoute('user/update/{id}', 'UserController@update');
$route->setRoute('user/update_post', 'UserController@update_post');