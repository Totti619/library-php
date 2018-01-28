<?php
/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 17/11/2017
 * Time: 20:36
 */
include "../../libs/bootstrap.php";
session_start();
$http=\Library\Configuration::http();
session_destroy();
header("Location: $http");