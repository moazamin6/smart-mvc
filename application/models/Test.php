<?php


namespace Application\Models;


use Core\SmartModel;

class Test extends SmartModel
{
    //public static $table = 'users';
    public function getter()
    {

        instance('Moaz', 'Amin', function ($name) {

            smartPrint($name);
        });
    }
}