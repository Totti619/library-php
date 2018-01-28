<?php
/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 14/11/2017
 * Time: 19:27
 */

require '../../libs/bootstrap.php';
use Library\User\Session;
if(Session::login($_POST['username'],$_POST['password'])){
    header("Location: ".\Library\Configuration::http());
}