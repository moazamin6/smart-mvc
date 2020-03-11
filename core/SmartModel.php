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
    public static $where_param_array = array();
    public static $set_param_array = array();
    public static $sql_query;
    public static $where_params;
    public static $set_params;

    public function __construct()
    {

    }

    public static function initializeDB()
    {
        Database::connection();
    }

    public static function all()
    {

        self::setTableName(get_called_class());
        $sql = 'SELECT * FROM ' . self::$table;
        return Database::fetchQuery($sql);
    }

    public static function find($id)
    {
        self::setTableName(get_called_class());
        $sql = "SELECT * FROM " . self::$table . " WHERE id=:id";
        return Database::findQuery($sql, ['id' => $id])[0];
    }

    public static function insert($data = array())
    {
        self::setTableName(get_called_class());
        $sql = self::createSqlString('insert', $data);
        Database::insertQuery($sql, $data);
    }

    public static function where($param)
    {
        self::setTableName(get_called_class());
        self::$where_params = self::bindWhereParams($param);
        self::$where_param_array = $param;
        return new self();
    }

    public static function get()
    {
        dd('this is get');
    }

    public static function update($param)
    {
        $full_params = array_merge($param, self::$where_param_array);
        self::$set_params = self::bindWhereParams($param, ',');
        $sql = self::createSqlString('update');

        Database::updateQuery($sql, $full_params);
    }

    public static function delete()
    {

        $sql = self::createSqlString('delete');
        return Database::deleteQuery($sql, self::$where_param_array);
    }

    public static function setTableName($class)
    {
        if (isset($class::$table)) {
            if ($class::$table == '') {
                self::$table = self::extractTableName($class);
            } else {
                self::$table = $class::$table;
            }
        } else {
            self::$table = self::extractTableName($class);
        }

        Database::setTable(self::$table);
    }

    public static function extractTableName($class)
    {
        $class_array = explode('\\', $class);
        $class_array = array_reverse($class_array);
        $class = $class_array[0];
        return strtolower($class) . 's';
    }

    private static function createSqlString($query, $data_array_1 = array(), $data_array_2 = array())
    {

        if ($query == 'insert') {

            $column_names = self::createQueryParams($data_array_1, ',');
            $column_placeholder = self::createQueryParams($data_array_1, ':', false);
            $sql = "INSERT INTO " . self::$table . " (" . $column_names . ") VALUES (" . $column_placeholder . ")";

            return $sql;
        }
        if ($query == 'update') {

            $sql = "UPDATE " . self::$table . " SET " . self::$set_params . " WHERE " . self::$where_params;
            //dd($sql);
            return $sql;
        }
        if ($query == 'delete') {

            $sql = "DELETE FROM " . self::$table . " WHERE " . self::$where_params;
            //dd($sql);
            return $sql;
        }
        if ($query == 'select') {


        }
    }

    private static function createQueryParams($data_array, $delimeter, $on_front = true)
    {
        $paramString = '';
        foreach ($data_array as $key => $col) {
            if ($on_front) {

                $paramString .= $key . '' . $delimeter;
            } else {

                $paramString .= $delimeter . '' . $key . ',';
            }
        }
        $paramString = rtrim($paramString, ',');
        return $paramString;
    }

    private static function bindWhereParams($params, $delimeter = 'AND')
    {
        $where = '';
        foreach ($params as $key => $value) {

            $where .= $key . '=:' . $key . ' ' . $delimeter . ' ';
        }
        $where = rtrim($where, ' ' . $delimeter . ' ');

        return $where;
    }
}