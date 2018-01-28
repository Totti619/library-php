<?php

/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 17/10/2017
 * Time: 19:39
 */
namespace Library\Database\Model;
use Library\Database\Model as Model;
class UserType extends Model
{
    const ADMINISTRATOR = 1;
    const LIBRARIAN = 2;
    const USER = 3;
    const ANONYMOUS = 4;

    private static $tableName = 'user_type';
    private static $autoIncrement = true;
    private static $columns = ['id', 'name'];
    private $values;
    private $id, $name;

    /**
     * UserType constructor.
     * @param $id
     * @param $name
     */
    public function __construct($name, $id = null)
    {
        $this->values = array($id, $name);
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public static function getTableName()
    {
        return self::$tableName;
    }

    /**
     * @param string $tableName
     */
    public static function setTableName($tableName)
    {
        self::$tableName = $tableName;
    }

    /**
     * @return bool
     */
    public static function isAutoIncrement()
    {
        return self::$autoIncrement;
    }

    /**
     * @param bool $autoIncrement
     */
    public static function setAutoIncrement($autoIncrement)
    {
        self::$autoIncrement = $autoIncrement;
    }

    /**
     * @return array
     */
    public static function columns()
    {
        return self::$columns;
    }

    /**
     * @param array $columns
     */
    public static function setColumns($columns)
    {
        self::$columns = $columns;
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param array $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /* START INSERT SELECT UPDATE DELETE METHODS */
    public function insert()
    {
        return parent::insertRow(self::getTableName(), self::columns(), $this->getValues(), self::isAutoIncrement());
    }
    public static function select($columns = null, $where = null)
    {
        return parent::selectWhere(self::getTableName(), $columns, $where);
    }
    public static function update($setColumn, $setValue, $whereColumn, $whereValue)
    {
        return parent::updateRow(self::getTableName(), $setColumn, $setValue, $whereColumn, $whereValue);
    }
    public static function delete($column, $value)
    {
        return parent::deleteRow(self::getTableName(), $column, $value);
    }
    /* END INSERT SELECT UPDATE DELETE METHODS */

    public static function get($id)
    {
        $result = self::select(null, "id=$id")->fetch_array();
        $i=0;
        $arg1=$result[++$i];
        return new self($arg1,$id);
    }
}