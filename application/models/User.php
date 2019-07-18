<?php
/**
 * Created by PhpStorm.
 * User.php: SiteAlive.pk
 * Date: 7/17/2019
 * Time: 11:03 PM
 */

namespace Application\Models;


use Core\SmartModel;

class User extends SmartModel
{
    private $table = 'user';

    public function __construct()
    {
        parent::__construct($this->table);
    }
}