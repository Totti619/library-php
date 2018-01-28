<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 28/01/2018
 * Time: 16:46
 */

use Library\Database\Model\BookCopy;
use Library\Database\Model\Reservation;
use Library\Database\Model\State;
use Library\Database\Model\User;
use Library\Database\SQLFunction;
include "../../../libs/bootstrap.php";
$isbn=$_GET["isbn"];
$date=$_GET["date"];
$user=$_GET["user"];
$userInstance=User::get($user);
$reservation_count=$userInstance->reservationCountToday();
$best=BookCopy::getBest($isbn);
$from_time=new DateTime($date);
$to_time=new DateTime($date." 23:59:59");
try {
    $to_time->add(new DateInterval("P" . BORROWED_DAYS . "D"));
    $reservation=new Reservation($from_time->format('Y-m-d'),
        $to_time->format('Y-m-d'),
        null,null,
        $best->getId(),$user
    );
    if($userInstance->passedReservationsLimit())
        echo "You passed the limit of reservations for today. <a href='" . \Library\Configuration::http() . "'>Go to home</a>";
//    elseif(!$reservation->isAvailable()) {
//        echo "This book is not available for that date. <a href='" . \Library\Configuration::http() . "'>Try another one!</a>";
//    }
    else {
        if($best->getState()==State::RESERVED||$best->getState()==State::TAKEN){
            if($reservation->isAvailable()){
                $reservation->insert();
                echo "available";
                echo "The book has been reserved! <a href='" . \Library\Configuration::http() . "'>Go to home</a>";
            } else {
                echo "There's no available copies for that date. <a href='" . \Library\Configuration::http() . "'>Try another one.</a>";
            }
        } else {
            $reservation->insert();
            $best->updateState(State::RESERVED);
            echo "The book has been reserved! <a href='" . \Library\Configuration::http() . "'>Go to home</a>";
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

