<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 21/01/2018
 * Time: 19:34
 */
include "../../../libs/bootstrap.php";
use Library\Database\Model\User;

User::update($_GET["field"],$_GET["value"],"id",$_GET["id"]);
header("Location: ".\Library\Configuration::http()."/views/user_page.php");
