<?php

/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 06/11/2017
 * Time: 20:39
 */
namespace Library;
require_once $_SERVER["DOCUMENT_ROOT"]."/DAW/library/config.php";
class Configuration
{
//    public static function database($databaseManagementSystem = "mysql")
//    {
//        return (include(dirname(dirname(__DIR__)) . "/config.php"))["database"][$databaseManagementSystem];
//    }
//    public static function databaseHost($databaseManagementSystem = "mysql")
//    {
//        return (include(dirname(dirname(__DIR__)) . "/config.php"))["database"][$databaseManagementSystem]["host"];
//    }
//    public static function databasePort($databaseManagementSystem = "mysql")
//    {
//        return (include(dirname(dirname(__DIR__)) . "/config.php"))["database"][$databaseManagementSystem]["port"];
//    }
//    public static function databaseName($databaseManagementSystem = "mysql")
//    {
//        return (include(dirname(dirname(__DIR__)) . "/config.php"))["database"][$databaseManagementSystem]["name"];
//    }
//    public static function databaseUser($databaseManagementSystem = "mysql")
//    {
//        return (include(dirname(dirname(__DIR__)) . "/config.php"))["database"][$databaseManagementSystem]["user"];
//    }
//    public static function databasePass($databaseManagementSystem = "mysql")
//    {
//        return (include(dirname(dirname(__DIR__)) . "/config.php"))["database"][$databaseManagementSystem]["password"];
//    }

    public static function get(){
        require $_SERVER["DOCUMENT_ROOT"]."/DAW/library/config.php";
    }
    public static function http()
    {
        return HTTP;
    }
    public static function root()
    {
        return ROOT;
    }
    public static function databaseDriver()
    {
        return DB_DRIVER;
    }
    public static function databaseHost()
    {
        return DB_HOST;
    }
    public static function databasePort()
    {
        return DB_PORT;
    }
    public static function databaseName()
    {
        return DB_NAME;
    }
    public static function databaseUser()
    {
        return DB_USER;
    }
    public static function databasePass()
    {
        return DB_PASS;
    }
}