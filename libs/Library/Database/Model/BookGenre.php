<?php

/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 17/10/2017
 * Time: 19:06
 */
namespace Library\Database\Model;
use Library\Database\Model as Model;
class BookGenre extends Model
{
    private static $tableName = 'book_genre';
    private static $autoIncrement = false;
    private static $columns = ['book', 'genre'];
    private $values;
    private $book, $genre;

    /**
     * BookGenre constructor.
     * @param $values
     * @param $book
     * @param $genre
     */
    public function __construct($book, $genre)
    {
        $this->values = array($book, $genre);
        $this->book = $book;
        $this->genre = $genre;
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
     * @return mixed
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param mixed $book
     */
    public function setBook($book)
    {
        $this->book = $book;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /* START INSERT SELECT UPDATE DELETE METHODS */
    public function insert()
    {
        return parent::insertRow(self::getTableName(), self::columns(), $this->getValues(), self::isAutoIncrement());
    }
    public static function select($columns = null, $where  = null)
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


}