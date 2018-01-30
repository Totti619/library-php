<?php
include "../libs/bootstrap.php";
use Library\Configuration;
use Library\Database\Model\Book;
use Library\Database\Model\BookCopy;
use Library\Database\Model\Reservation;
use Library\Database\Model\User;
//
$root=Configuration::root();
$http=Configuration::http();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <?php include "$root/views/layouts/links.php" ?>
    <?php include "$root/views/layouts/head_scripts.php"?>

    <title>Home - Library</title>
</head>
<body>
    <?php include "$root/views/layouts/user_bar.php"?>
    <?php include "$root/views/layouts/nav.php" ?>

    <?php
    $reservations=\Library\User\Session::isLogged()
        ?   Reservation::getAllPendentOfUser(User::get($_SESSION["id"]))
        :   []
    ;
    ?>

    <div class="container">
        <h2>Your reservations</h2>
        <section class="row">
            <?php if(!empty($reservations)):?>
                <?php foreach ($reservations AS $reservation):?>
                    <div class="card" style="width: 20rem;margin:20px;padding: 10px;">
                        <div class="card-block">
                            <h4 class="card-title"><?php echo (Book::get((BookCopy::get($reservation->getBookCopy()))->getBook()))->getTitle();?></h4>
                            <p class="card-text">From: <?php echo $reservation->getFromTime()?></p>
                            <p class="card-text">To: <?php echo $reservation->getToTime()?></p>
                            <a href="<?php echo "$http/actions/crud/reservation/cancel.php?id=".$reservation->getId()?>" class="btn btn-danger">
                                Cancel reservation
                            </a>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php else: ?>
                <p>You don't reserved any book yet. <a href="<?php echo "$http/views/reserve_a_book_view.php";?>">Do it!</a></p>
            <?php endif;?>
        </section>
    </div>


    <?php include "$root/views/layouts/footer.php" ?>
    <?php include "$root/views/layouts/body_scripts.php"?>
</body>
</html>