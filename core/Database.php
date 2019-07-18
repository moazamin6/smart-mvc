<?php
/**
 * Created by PhpStorm.
 * User.php: moaza
 * Date: 6/9/2019
 * Time: 2:39 PM
 */

namespace Core;


use PDO;
use PDOException;

class Database
{
    private static $con = null;
    private static $table = null;
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
            self::$con = new PDO($dsn, DB_USER, DB_PASS, self::$options);
            return self::$con;

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function fetch()
    {
        try {
            $sql = "SELECT * FROM " . self::$table;
            $stmt = self::$con->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();

            return $result;
        } catch (PDOException $e) {
            smartPrint($e->getMessage());
        }
    }

    public static function setTable($table)
    {
        self::$table = $table;
    }
}