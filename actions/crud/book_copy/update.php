<?php
include "../../../libs/bootstrap.php";
$isbn=$_GET["isbn"];
$id=$_GET["id"];
$state=$_GET["state"];
\Library\Database\Model\BookCopy::update("state",
    $state,
    "id",
    $id
);
header("location: ".\Library\Configuration::http()."/views/copies_view.php?isbn=$isbn");