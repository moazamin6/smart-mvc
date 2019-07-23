<?php

use Core\Route;

require_once '../bootstrap/bootstrap.php';

//smartPrint(CONFIG_URL);
//route file object for defining routes in route.php
$route = new Route();
include_once '../config/route.php';

$route->loadRoute();
