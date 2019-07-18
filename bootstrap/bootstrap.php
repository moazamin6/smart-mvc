<?php
/**
 * Created by PhpStorm.
 * User.php: moaza
 * Date: 5/27/2019
 * Time: 8:50 PM
 */

use Core\SmartModel;

/**
 * autoload namespaces and helper files
 */

require("../vendor/autoload.php");

if (DB_USAGE) {
    SmartModel::initializeDB();
}



