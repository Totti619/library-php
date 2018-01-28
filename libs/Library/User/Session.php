<?php
/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 14/12/2017
 * Time: 21:14
 */

namespace Library\User;

use Library\Configuration;
use Library\Database\Model\User;
use Library\Database\Model\UserType;

abstract class Session
{
    public static function start(){
        session_start();
        if(!isset($_SESSION)){
            session_unset();session_destroy();
            header("Location: ".Configuration::http()."/views/login.php");
        }
    }
    public static function stop(){
        session_unset();session_destroy();
        header("Location: ".Configuration::http()."/views/login.php");
    }
    public static function login($username,$password){
        session_start();
        $result=User::select(null,"username = '$username' and password = password('$password')")->fetch_array();
        if(!$result["id"]){
           // header("Location: ".Configuration::http()."/views/login.php");
        } else {
            $_SESSION["id"]=$result["id"];
            $_SESSION["username"]=$result["username"];
            $userType=UserType::get($result["type"]);
            $_SESSION["user_type_id"]=$userType->getId();
            $_SESSION["user_type"]=$userType->getName();
        }
        header("Location: ".Configuration::http());
    }

    /**
     * @param $realName
     * @param $surnames
     * @param $dni
     * @param $telephoneNumber
     * @param $email
     * @param $emailRepeat
     * @param $username
     * @param $password
     * @param $passwordRepeat
     * @return bool|string
     */
    public static function register(
        $realName,
        $surnames,
        $dni,
        $telephoneNumber,
        $email,
        $emailRepeat,
        $username,
        $password,
        $passwordRepeat,
        $userType
    ) {
        if($password===$passwordRepeat){
            if($email===$emailRepeat) {
                $user=new User
               ($username, $password, $dni, $email, $telephoneNumber, $realName, $surnames, User::IS_NOT_DEFAULTING, $userType);
                $userCreated=$user->insert();
                if($userCreated) {
                    self::login(
                        $user->getUsername(),
                        $password
                    );
                    echo "User registrered";
                    return true;
                }
                echo "Fail";
                return false;
            }
            return "The emails don't match!";
        }
        return "The passwords don't match!";
    }

    public static function isLogged(){
        return isset($_SESSION["id"]);
    }

    public static function isType($userType){
        return $_SESSION["user_type_id"]==$userType;
    }



}