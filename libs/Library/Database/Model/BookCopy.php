<?php

/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 17/10/2017
 * Time: 19:04
 */
namespace Library\Database\Model;
use Library\Database\Model as Model;
class BookCopy extends Model
{
    private static $tableName = 'book_copy';
    private static $autoIncrement = true;
    private static $columns = ['id', 'book', 'state'];
    private $values;
    private $id, $book, $state;

    /**
     * BookCopy constructor.
     * @param $values
     * @param $id
     * @param $book
     * @param $state
     */
    public function __construct($book, $state, $id = null)
    {
        $this->values = array($id, $book, $state);
        $this->id = $id;
        $this->book = $book;
        $this->state = $state;
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
     * @param string|int $isbn
     * @return BookCopy
     */
    public static function getBest($isbn)
    {
        $bookCopies=self::getAllOfBook($isbn);
        usort($bookCopies,function ($a,$b){
           return $a->getState()<$b->getState()?1:-1;
        });
        return $bookCopies[0];
    }
    public static function getWorst($isbn)
    {
        $bookCopies=self::getAllOfBook($isbn);
        usort($bookCopies,function ($a,$b){
            return $a->getState()>$b->getState()?1:-1;
        });
        return $bookCopies[0];
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    public function updateState($state)
    {
        $this->setState($state);
        self::update("state",$state,"id",$this->getId());
    }

    /**
     * @param string $isbn
     * @param book $onlyInStock
     * @return BookCopy[]
     */
    public static function getAllOfBook($isbn,$onlyInStock=false)
    {
        $array=[];
        $where="book = ".$isbn."";
        if($onlyInStock)
            $where.=" and state not BETWEEN 1 and 2";
        $result=BookCopy::select("id",$where);
        foreach ($result AS $row)
            $array[]=BookCopy::get($row["id"]);
        return $array;
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

    /**
     * @param $id
     * @return BookCopy
     */
    public static function get($id){
        $result=self::select(null,"id=$id")->fetch_array();
        $i=0;
        $book=$result[++$i];
        $state=$result[++$i];
        return new self($book, $state, $id);
    }
}