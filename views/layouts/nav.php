<?php
//require_once "../../libs/bootstrap.php";
use Library\Configuration;
use Library\User\Session;
use \Library\Database\Model\UserType;

$http=Configuration::http();
?>


<nav class="navbar navbar-expand-lg" style="background-color: #1047A9; min-height: 60px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="material-icons text-white" height="100px">menu</i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-white" href="<?php echo $http;?>">Home <span class="sr-only">(current)</span></a>
            </li>


            <?php if(Session::isLogged()):?>
                <?php if(Session::isType(UserType::ADMINISTRATOR)||Session::isType(UserType::LIBRARIAN)):?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo $http.'/views/books.php';?>">Manage books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo $http.'/views/reservations.php';?>"> Manage reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo $http.'/views/users.php';?>">Manage users</a>
                    </li>
                <?php endif;?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo $http.'/views/reserve_a_book_view.php';?>">Reserve a book</a>
                </li>
            <?php endif; ?>

            <?php if(!Session::isLogged()):?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo $http.'/views/register.php';?>">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo $http.'/views/login.php';?>">Login</a>
                </li>
            <?php endif; ?>


        </ul>
        <!--        <p class="text-white text-center" style="margin: 10px">Hi, admin</p>-->
    </div>
</nav>
