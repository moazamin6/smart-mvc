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

            $dsn = "mysql:host=" . Config::get('db_host') . ";dbname=" . Config::get('db_name');
            self::$con = new PDO($dsn, Config::get('db_user'), Config::get('db_pass'), self::$options);
            return self::$con;

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function fetchQuery($sql)
    {
        try {
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

    public static function findQuery($sql, $data)
    {
        try {

            $stmt = self::$con->prepare($sql);
            $stmt->execute($data);
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {

            dd($e->getMessage());
        }
    }

    public static function insertQuery($sql, $data)
    {

        try {
            //$sql = self::createSqlString('insert', $data);
            $stmt = self::$con->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $e) {

            dd($e->getMessage());
        }
    }

    public static function updateQuery($sql, $params)
    {

        try {

            $stmt = self::$con->prepare($sql);
            $stmt->execute($params);
            $count = $stmt->rowCount();
            if ($count) {
                return $count;
            }
        } catch (PDOException $e) {
            smartPrint($e->getMessage());
        }
    }

    public function bind($param, $value, $type = null, $stmt)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $stmt->bindValue($param, $value, $type);
    }

    public static function deleteQuery($sql, $params)
    {

        try {

            $stmt = self::$con->prepare($sql);
            $stmt->execute($params);
            $count = $stmt->rowCount();
            if ($count) {
                return $count;
            }
        } catch (PDOException $e) {
            smartPrint($e->getMessage());
        }
    }
}