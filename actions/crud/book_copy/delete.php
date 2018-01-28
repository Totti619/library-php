<?php
include "../../../libs/bootstrap.php";
$isbn=$_GET["isbn"];
$id=$_GET["id"];
\Library\Database\Model\BookCopy::delete("id",$id);
header("location: ".\Library\Configuration::http()."/views/copies_view.php?isbn=$isbn");