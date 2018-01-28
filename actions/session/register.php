<?php
/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 18/01/2018
 * Time: 20:26
 */
require '../../libs/bootstrap.php';
use Library\User\Session;

//echo "\n".$_POST["real_name"];
//echo "\n".$_POST["surnames"];
//echo "\n".$_POST["dni"];
//echo "\n".$_POST["telephone_number"];
//echo "\n".$_POST["email"];
//echo "\n".$_POST["emailRepeat"];
//echo "\n".$_POST["username"];
//echo "\n".$_POST["password"];
//echo "\n".$_POST["passwordRepeat"];

Session::register(
    $_POST["real_name"],
    $_POST["surnames"],
    $_POST["dni"],
    $_POST["telephone_number"],
    $_POST["email"],
    $_POST["emailRepeat"],
    $_POST["username"],
    $_POST["password"],
    $_POST["passwordRepeat"],
    \Library\Database\Model\UserType::USER
);