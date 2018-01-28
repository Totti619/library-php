<?php
/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 04/12/2017
 * Time: 20:29
 */
include "../../libs/bootstrap.php";
use Library\Database\Model;
$http=\Library\Configuration::http();
echo( Model::insertAutoIncrementalValue($_GET['table'],$_POST['value']) );
header("Location: $http/views/add_a_book.php");