<?php
include "../../../libs/bootstrap.php";
$isbn=$_GET["isbn"];
$state=$_GET["state"];
(new \Library\Database\Model\BookCopy($isbn,$state))->insert();
header("location: ".\Library\Configuration::http()."/views/copies_view.php?isbn=$isbn");