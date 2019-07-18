<?php
/**
 * Created by PhpStorm.
 * User: moaza
 * Date: 6/9/2019
 * Time: 2:39 PM
 */

namespace Core;


class SmartModel
{
    protected $table;

    public function __construct()
    {

    }

    public static function initializeDB()
    {
        $database = new Database();
        $database->connection();
    }

    public static function all()
    {
        //Database::fetch($this->table);
    }

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }
}