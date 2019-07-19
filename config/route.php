<?php

/*
 *  use $route variable and call setRoute function to define routes
 *
 * */

$route->setRoute('/', 'UserController@index');
$route->setRoute('user/list', 'UserController@list');
$route->setRoute('user/add', 'UserController@add');
$route->setRoute('user/add_post', 'UserController@addPost');
$route->setRoute('user/delete/{id}', 'UserController@delete');
$route->setRoute('user/update/{id}', 'UserController@update');



$route->setRoute('post_check', 'UserController@postCheck');
