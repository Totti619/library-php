<?php

use Library\Database\Model\Reservation;
include "../../../libs/bootstrap.php";
$id=$_GET["id"];
$action=$_GET["action"];

Reservation::update($action, (new DateTime())->format("Y-m-d h:m:s"), "id",$id);
$reservation=Reservation::get($id);
$bookCopy=\Library\Database\Model\BookCopy::get($reservation->getBookCopy());
if($action==="take_time")
    $bookCopy->updateState(\Library\Database\Model\State::TAKEN);
else
    $bookCopy->updateState(\Library\Database\Model\State::DEFAULT);
header("location: ".\Library\Configuration::http()."/views/reservations.php");