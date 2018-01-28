<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 06/10/2017
 * Time: 18:18
 */
namespace Library\Database;

use Exception;
use Library\Configuration;
use Library\User\Password;

abstract class Model
{
    /**
     * @param $tableName
     * @param $columns
     * @param $values
     * @param bool $autoIncrement
     * @return bool|Exception|string
     */
    protected static function insertRow($tableName, $columns, $values, $autoIncrement = false)
    {
        /*
         * example: $tableName = 'person', $columns = ['name','surname']
         * $values = [
         *      ['Antonio','Ortiz'],
         *      ['Sam','Barnsby'],
         * ];
         */
        $db = Configuration::databaseName();
        $connection = Connection::getInstance();

        if(empty($tableName)) return new Exception('table name is empty');
        if(empty($columns)) return new Exception('columns array is empty');
        if(empty($values)) return new Exception('values array is empty');

        $c = 0; $v = 0;
        if($autoIncrement === TRUE) {
            $c++; $v++;
        }

        $columnsString = '(';
        for ($i = $c; $i < count($columns); $i++) {
            if ($i < count($columns) - 1)
                $columnsString .= $columns[$i].', ';
            else
                $columnsString .= $columns[$i].') ';

        }

        $valuesString = '(';
        for ($i = $v; $i < count($values); $i++) {
            if ($i < count($values) - 1)
                if($values[$i] instanceof SQLFunction)
                    $valuesString.=$values[$i].', ';
                else
                    $valuesString .= '\''.$values[$i].'\''.', ';
            else
                $valuesString .= '\''.$values[$i].'\''.')';
        }

        $sql = 'INSERT INTO '.$db.'.'.$tableName.$columnsString.' VALUES '.$valuesString;
        if($connection->query($sql) === TRUE)
            $done = true;
        else
            $done = $connection->error();
        $connection = null; //closes it
        //echo $sql;
        return $done;
    }
    public abstract function insert();
    public abstract static function select($columns = null, $where = null);
    public abstract static function update($setColumn, $setValue, $whereColumn, $whereValue);
    public abstract static function delete($column, $value);
    public static function getColumns($tableName) {
        $db = Configuration::databaseName();
        $connection = Connection::getInstance();
        $result = $connection->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='$db' AND TABLE_NAME= '$tableName'");
        $res = array();
        while($row = $result->fetch_array()) $res[] = $row;
        return $res;
    }
    public static function getLast($tableName, $column) {
        $db = Configuration::databaseName();
        $connection = Connection::getInstance();
        $result = $connection->query("SELECT MAX($column) FROM ".$db.".$tableName WHERE 1");
        $connection = null;
        return $result;
    }
    public static function selectWhere($tableName, $columns = null, $where = null, $misc = null)
    {
        $db=Configuration::databaseName();
        if(is_null($columns)) $columns = "*";
        $connection = Connection::getInstance();
        $result = null;
        $sql = null;
        if (is_null($where) && is_null($misc))
            $sql = "SELECT $columns FROM ".$db.".$tableName";
        else if(is_null($misc))
            $sql = "SELECT $columns FROM ".$db.".$tableName WHERE $where";
        else
            $sql = "SELECT $columns FROM ".$db.".$tableName $misc";
        $result = $connection->query($sql);
        $connection = null;
        return $result;
    }

    public static function updateRow($tableName, $setColumn, $setValue, $whereColumn, $whereValue)
    {
        $db=Configuration::databaseName();
        $connection = Connection::getInstance();
        $sql="UPDATE $db."."$tableName SET $setColumn = '$setValue' WHERE $whereColumn = '$whereValue'";
        $result = $connection->query($sql);
        $connection = null;
        return $result;
    }
    public static function deleteRow($tableName, $column, $value)
    {
        $db=Configuration::databaseName();
        $connection = Connection::getInstance();
        $result = $connection->query("DELETE FROM $db".".$tableName WHERE $column = $value");
        $connection = null;
        return $result;
    }
    public static function query($sql)
    {
        $connection = Connection::getInstance();
        $result = $connection->query($sql);
        $connection = null;
        return $result;
    }

    /**
     * @param $table
     * @param $value
     */
    public static function insertAutoIncrementalValue($table, $value)
    {
        $db=Configuration::databaseName();
        $connection=Connection::getInstance();
        $result=$connection->query("INSERT INTO $db.".$table." VALUES (NULL, '$value')");
        $connection=null;
        return $result;
    }

}