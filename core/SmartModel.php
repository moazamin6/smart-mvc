<?php
/**
 * Created by PhpStorm.
 * User.php: moaza
 * Date: 6/9/2019
 * Time: 2:39 PM
 */

namespace Core;


class SmartModel
{
    private static $table;

    public function __construct($table)
    {
        self::$table = $table;
        Database::setTable($table);
    }

    public static function initializeDB()
    {
        $database = new Database();
        $database->connection();
    }

    public static function all()
    {
        return Database::fetch();
    }

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }
}