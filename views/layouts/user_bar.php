<?php use Library\User\Session;

session_status()!==PHP_SESSION_NONE?:session_start();
?>
    <div class="row">
        <div class="col-12 bg-dark">
            <?php if(Session::isLogged()):?>
            <div class="float-right text-white">
                Hello, <?php echo ($_SESSION["username"] ?? 'anon')?>
                <button class="btn btn-primary"
                        onclick="window.location.href='<?php echo "$http/views/user_page.php"?>'">
                    Edit profile
                </button>
                <button class="btn btn-danger"
                        onclick="window.location.href='<?php echo "$http/actions/session/abort.php"?>'">
                    Logout
                </button>
            </div>
            <?php else:
                    header("Location: ".\Library\Configuration::http()."/views/login.php")
                ?>
<!--            <div class="float-right text-white">-->
<!--                Ain't logged yet? <a href="--><?php //echo "$http/views/login.php"?><!--">Login</a>-->
<!--            </div>-->
            <?php endif;?>
        </div>
    </div>

