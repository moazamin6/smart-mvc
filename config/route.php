<?php

/*
 *  use $route variable and call setRoute function to define routes
 * */
$route->setRoute('/', 'TestController@index');
$route->setRoute('test/{id}/{name}', 'TestController@test');
$route->setRoute('customer/add', 'TestController@add');
$route->setRoute('customer/display/{id}', 'TestController@add');
$route->setRoute('customer/display/item/{id}/{age}/{name}', 'TestController@add');
//
//$route->setRoute('customer/delete', 'CustomerController.php@delete');
//
//
//$route->setRoute('customer/deletee', 'CustomerController.php@deleteeeeee');