<?php
use Library\Database\Model\User;
include "../../../libs/bootstrap.php";
$id=$_GET["id"];
User::delete("id",$id);
header("location: ".\Library\Configuration::http()."/views/users.php");