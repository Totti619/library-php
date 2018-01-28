<?php

/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 10/10/2017
 * Time: 19:06
 */
namespace Library\Database\Model;
use Library\Database\Model as Model;
class Book extends Model
{
    private static $tableName = 'book';
    private static $autoIncrement = false;
    private static $columns = ['isbn', 'title', 'year', 'edition', 'edition_year', 'editorial', 'country', 'language'];
    private $values;
    private $isbn, $title, $year, $edition, $editionYear, $editorial, $country, $language;

    /**
     * BookModel constructor.
     * @param $isbn
     * @param $title
     * @param $year
     * @param $edition
     * @param $editionYear
     * @param $editorial
     * @param $country
     * @param $language
     */
    public function __construct($isbn = 6666666666666, $title = "Sample Book", $year = 2000, $edition = 1, $editionYear = 2000, $editorial = 1, $country = 1, $language = 1)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->year = $year;
        $this->edition = $edition;
        $this->editionYear = $editionYear;
        $this->editorial = $editorial;
        $this->country = $country;
        $this->language = $language;
        $this->values = [$isbn, $title, $year, $edition, $editionYear, $editorial, $country, $language];
    }


    /**
     * @return Book[]
     */
    public static function getAllInStock()
    {
        $booksInStock=[];
        $books=Book::getAll();
        foreach($books AS $book)
            if($book->isInStock())
                $booksInStock[]=$book;
        return $booksInStock;
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
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * @param mixed $edition
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
    }

    /**
     * @return mixed
     */
    public function getEditionYear()
    {
        return $this->editionYear;
    }

    /**
     * @param mixed $editionYear
     */
    public function setEditionYear($editionYear)
    {
        $this->editionYear = $editionYear;
    }

    /**
     * @return mixed
     */
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * @param mixed $editorial
     */
    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return Book
     *
     * private $isbn, $title, $year, $edition, $editionYear, $editorial, $country, $language;
     */
    public static function get($id){
        $result=self::select(null,"isbn=$id")->fetch_array();
        $i=0;
        $isbn=$id;
        $title=$result[++$i];
        $year=$result[++$i];
        $edition=$result[++$i];
        $editionYear=$result[++$i];
        $editorial=$result[++$i];
        $country=$result[++$i];
        $language=$result[++$i];
        return new self($isbn, $title, $year, $edition, $editionYear, $editorial, $country, $language);
    }

    /**
     * @return Book[]
     */
    public static function getAll(){
        $array=[];
        foreach(Book::select() AS $row)
            $array[]=Book::get($row["isbn"]);
        return $array;
    }

    /**
     * @return bool
     */
    public function isInStock()
    {
//        $bookCopies=BookCopy::getAllOfBook($this->getIsbn());
//        if(!empty($bookCopies))
//            foreach($bookCopies AS $bookCopy)
//                if(!(
//                    $bookCopy->getState()==State::RESERVED ||
//                    $bookCopy->getState()==State::TAKEN
//                )) return true;
//        return false;
        if(empty(BookCopy::getAllOfBook($this->getIsbn())))
             return false;
        return true;
    }
}