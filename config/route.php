<?php

/*
 *  use $route variable and call setRoute function to define routes
 *
 * */

$route->setRoute('/', 'UserController@index');
$route->setRoute('home', 'UserController@home');
$route->setRoute('customer/display/{id}', 'TestController@display');
$route->setRoute('test/{id}', 'TestController@test');
$route->setRoute('customer/display/item/{id}/{age}/{name}', 'TestController@add');
