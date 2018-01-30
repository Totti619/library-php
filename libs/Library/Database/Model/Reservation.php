<?php

/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 17/10/2017
 * Time: 19:18
 */
namespace Library\Database\Model;
use Library\Database\Model as Model;
use Library\Database\SQLFunction;

class Reservation extends Model
{
    private static $tableName = 'reservation';
    private static $autoIncrement = true;
    private static $columns = ['id', 'from_time', 'to_time', 'take_time', 'return_time', 'book_copy', 'user'];
    private $values;
    private $id, $fromTime, $toTime, $takeTime, $returnTime, $bookCopy, $user;

    /**
     * Reservation constructor.
     * @param string|\DateTime $fromTime
     * @param string|\DateTime $toTime
     * @param string|\DateTime $takeTime
     * @param string|\DateTime $returnTime
     * @param int|string $bookCopy
     * @param int|string $user
     * @param null|string|int $id
     */
    public function __construct($fromTime, $toTime, $takeTime, $returnTime, $bookCopy, $user, $id = null)
    {
        $this->id = $id;
        $this->fromTime = $fromTime;
        $this->toTime = $toTime;
        $this->takeTime = $takeTime;
        $this->returnTime = $returnTime;
        $this->bookCopy = $bookCopy;
        $this->user = $user;

        $this->values = array($id, $fromTime, $toTime, $takeTime, $returnTime, $bookCopy, $user);
    }

    /**
     * @param User $user
     * @return Reservation[]
     */
    public static function getAllOfUser($user)
    {
        $array=[];
        foreach (Reservation::getAll() AS $reservation)
            if($reservation->getUser()===$user->getId())
                $array[]=$reservation;
        return $array;
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
    public function getFromTime()
    {
        return $this->fromTime;
    }

    /**
     * @param mixed $fromTime
     */
    public function setFromTime($fromTime)
    {
        $this->fromTime = $fromTime;
    }

    /**
     * @return mixed
     */
    public function getToTime()
    {
        return $this->toTime;
    }

    /**
     * @param mixed $toTime
     */
    public function setToTime($toTime)
    {
        $this->toTime = $toTime;
    }

    /**
     * @return mixed
     */
    public function getTakeTime()
    {
        return $this->takeTime;
    }

    /**
     * @param mixed $takeTime
     */
    public function setTakeTime($takeTime)
    {
        $this->takeTime = $takeTime;
    }

    /**
     * @return mixed
     */
    public function getReturnTime()
    {
        return $this->returnTime;
    }

    /**
     * @param mixed $returnTime
     */
    public function setReturnTime($returnTime)
    {
        $this->returnTime = $returnTime;
    }

    /**
     * @return mixed
     */
    public function getBookCopy()
    {
        return $this->bookCopy;
    }

    /**
     * @param mixed $bookCopy
     */
    public function setBookCopy($bookCopy)
    {
        $this->bookCopy = $bookCopy;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
     * @return Reservation
     *
     * $id, $fromTime, $toTime, $takeTime, $returnTime, $bookCopy, $user;
     */
    public static function get($id)
    {
        $result = self::select(null, "id=$id")->fetch_array();
        $i=0;
        $arg1=$result[++$i];
        $arg2=$result[++$i];
        $arg3=$result[++$i];
        $arg4=$result[++$i];
        $arg5=$result[++$i];
        $arg6=$result[++$i];
        return new self($arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$id);
    }

    /**
     * @return Reservation[]
     */
    public static function getAll(){
        $array=[];
        foreach(Reservation::select() AS $row)
            $array[]=Reservation::get($row["id"]);
        return $array;
    }

    /**
     * @return bool
     */
    public function isAvailable()
    {
        //$free=true;
        foreach(self::getAll() AS $reservation){
            if($this->getBookCopy()==$reservation->getBookCopy()){
                if(new \DateTime($this->getFromTime())>new \DateTime($reservation->getToTime())){
                    echo "asdf";
                    return true;
                }
                return false;
            }
        }
        return true;
    }
}