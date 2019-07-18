<?php
/**
 * Created by PhpStorm.
 * User.php: SiteAlive.pk
 * Date: 7/17/2019
 * Time: 11:03 PM
 */

// give namespace till folder name in which this file exist
namespace Application\Models;


use Core\SmartModel;

class Model extends SmartModel
{
    //give that table name that you want to access from this model file
    private $table = 'user';

    public function __construct()
    {
        parent::__construct($this->table);
    }
}