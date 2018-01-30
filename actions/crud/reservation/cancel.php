<?php
use Library\Database\Model\Reservation;
include "../../../libs/bootstrap.php";
$id=$_GET["id"];
Reservation::delete("id",$id);
header("location: ".\Library\Configuration::http()."/views/index.php");