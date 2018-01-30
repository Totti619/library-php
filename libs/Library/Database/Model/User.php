<?php

/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 17/10/2017
 * Time: 19:28
 */
namespace Library\Database\Model;
use Library\Database\Model as Model;
use Library\Database\SQLFunction;
use Library\User\Password;

class User extends Model
{
    const IS_DEFAULTING = 1;
    const IS_NOT_DEFAULTING = 0;

    private static $tableName = 'user';
    private static $autoIncrement = true;
    private static $columns = ['id', 'username', 'password', 'dni', 'email', 'telephone_number', 'real_name', 'surnames', 'is_defaulting', 'type'];
    private $values;
    private $id, $username, $password, $dni, $email, $telephoneNumber, $realName, $surnames, $defaulting, $type;

    /**
     * User constructor.
     * @param $username
     * @param $password
     * @param $dni
     * @param $email
     * @param $telephoneNumber
     * @param $realName
     * @param $surnames
     * @param int $defaulting
     * @param int $type
     * @param int|string|null $id
     */
    public function __construct($username, $password, $dni, $email, $telephoneNumber, $realName, $surnames, $defaulting=User::IS_NOT_DEFAULTING, $type=UserType::ADMINISTRATOR, $id = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = new SQLFunction("password", $password);
        $this->dni = $dni;
        $this->email = $email;
        $this->telephoneNumber = $telephoneNumber;
        $this->realName = $realName;
        $this->surnames = $surnames;
        $this->defaulting = $defaulting;
        $this->type = $type;
        $this->values = array($id, $username, $this->password, $dni, $email, $telephoneNumber, $realName, $surnames, $defaulting, $type);
    }

    /**
     * @return int
     */

    /**
     * @return bool
     */
    public function passedReservationsLimit(){
        return $this->reservationCountToday()>=MAX_RESERVATIONS_PER_USER_ON_A_DAY;
    }

    public function reservationCountToday()
    {
        return Reservation::select(new SQLFunction("count","*"),"from_time BETWEEN curdate() AND curdate()+INTERVAL 1 DAY")->fetch_array()[0];
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
     * @return int|string
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelephoneNumber()
    {
        return $this->telephoneNumber;
    }

    /**
     * @param mixed $telephoneNumber
     */
    public function setTelephoneNumber($telephoneNumber)
    {
        $this->telephoneNumber = $telephoneNumber;
    }

    /**
     * @return mixed
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * @param mixed $realName
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;
    }

    /**
     * @return mixed
     */
    public function getSurnames()
    {
        return $this->surnames;
    }

    /**
     * @param mixed $surnames
     */
    public function setSurnames($surnames)
    {
        $this->surnames = $surnames;
    }

    /**
     * @return bool
     */
    public function isDefaulting()
    {
        return $this->defaulting;
    }

    /**
     * @param bool $defaulting
     */
    public function setDefaulting($defaulting)
    {
        $this->defaulting = $defaulting;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return User
     * $id, $username, $password, $dni, $email, $telephoneNumber, $realName, $surnames, $defaulting, $type;
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
        $arg7=$result[++$i];
        $arg8=$result[++$i];
        $arg9=$result[++$i];
        return new self($arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$arg7,$arg8,$arg9,$id);
    }

    /**
     * @return User[]
     */
    public static function getAll(){
        $array=[];
        foreach(User::select() AS $row)
            $array[]=User::get($row["id"]);
        return $array;
    }
}