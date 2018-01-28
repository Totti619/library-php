<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 06/10/2017
 * Time: 18:18
 */
namespace Library\Database;
use Exception;
use mysqli;
use Library\Configuration;

class Connection
{
    /**
     * @var Connection
     */
    private static $INSTANCE;
    /**
     * @var mysqli
     */
    private $connection;

    /**
     * Connection constructor.
     */
    protected function __construct()
    {
        $this->connection = new mysqli(
            Configuration::databaseHost(),
            Configuration::databaseUser(),
            Configuration::databasePass(),
            Configuration::databaseName()
        );
    }

    /**
     * Connection destructor.
     */
    public function __destruct()
    {
        if (!is_null($this->connection))
            return $this->connection->close();
    }

    /**
     * Returns the instance of the connection.
     * @return Connection|null
     */
    public static function getInstance() {
        self::$INSTANCE = null;
        if (is_null(self::$INSTANCE) === TRUE) self::$INSTANCE = new Connection();
        return self::$INSTANCE;
    }

    /**
     * @param string $sql
     * @return bool|Exception|\mysqli_result
     */
    public function query($sql)
    {
        if (!is_null($this->connection))
            return $this->connection->query($sql);
        else return new Exception("connection is closed.");
    }

    /**
     * @return bool
     */
    public function success()
    {
        if($this->connection->connect_errno) return false;
        return true;
    }

    /**
     * @return string|bool
     */
    public function error()
    {
        return $this->connection->error;
    }
}