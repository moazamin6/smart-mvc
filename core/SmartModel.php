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

        self::setTableName(get_called_class());
        return Database::fetch();
    }


    public static function delete($id)
    {
        self::setTableName(get_called_class());
        return Database::delete($id);
    }

    public static function setTableName($class)
    {
        self::$table = self::extractTableName($class);
        Database::setTable(self::$table);
    }

    public static function extractTableName($class)
    {
        $class_array = explode('\\', $class);
        $class_array = array_reverse($class_array);
        $class = $class_array[0];
        return strtolower($class) . 's';
    }
}