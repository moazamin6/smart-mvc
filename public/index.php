<?php


use Core\Route;
include_once '../config/config.php';
require_once '../bootstrap/bootstrap.php';

//route file object for defining routes in route.php
$route = new Route();
include_once '../config/route.php';

$route->loadRoute();
