<?php
use Library\Configuration;
$root=Configuration::root();

?>


<nav class="navbar navbar-expand-lg" style="background-color: #1047A9; min-height: 60px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="material-icons text-white" height="100px">menu</i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-white" href="controllers/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Login</a>
            </li>

            <li class="nav-item">

                <p class="nav-item text-white">
                    <?php
                    //                    if (session_status() == PHP_SESSION_NONE)
                    session_start();
                    echo "Hello, ";
                    if(session_status() != PHP_SESSION_NONE) echo $_SESSION['username'];
                    else echo "Guest";
                    echo "
                            <form action='abort.php'>
                                <input type='submit' value='Logout'>
                            </form>
                        ";
                    ?>
                </p>
            </li>
        </ul>
        <!--        <p class="text-white text-center" style="margin: 10px">Hi, admin</p>-->
    </div>
</nav>
