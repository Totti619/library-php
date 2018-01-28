<?php
/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 19/10/2017
 * Time: 20:50
 */
namespace Library\User;

use Library\Database\Model\User;

abstract class UserController
{
    public static function login($username, $password) {
        if (isset($username) && isset($password)) {
            $result = User::select('username', "username = '$username' and password = password('$password')")->fetch_array()[0];
            if (!is_null($result)) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['time'] = time();
                return true;
            } else {
                echo "Session not successful";
            }
        } else echo "username or password are not set";
        return false;
    }
    public static function register($username, $password, $dni, $email, $telephoneNumber, $realName, $surnames, $type, $defaulting = false)
    {

    }
    public static function logout() {

    }
}