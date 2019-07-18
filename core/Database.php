<?php
/**
 * Created by PhpStorm.
 * User: moaza
 * Date: 6/9/2019
 * Time: 2:39 PM
 */

namespace Core;


use PDO;
use PDOException;

class Database
{
    private static $con = null;
    private static $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    );

    public function __construct()
    {
    }

    public static function connection()
    {
        try {

            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            Database::$con = new PDO($dsn, DB_USER, DB_PASS, Database::$options);
            return Database::$con;

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function fetch($table)
    {
        echo "fetch from $table";
    }
}