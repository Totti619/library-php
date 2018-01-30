<?php
include "../libs/bootstrap.php";

use Library\Configuration;
use Library\Database\Model\User;
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
<?php include "$root/views/layouts/nav.php";$user=User::get(isset($_GET["id"])?$_GET["id"]:$_SESSION["id"]); ?>

<div class="container">
<!--        <form action="--><?php //echo "$http/actions/session/register.php" ?><!--" method="post">-->

            <div class="form-row">
                <div class="col">
                    <label for="real_name">Real name (Current: <?php echo $user->getRealName();?>)
                        <input type="text" class="form-control" id="real_name" name="real_name" aria-describedby="emailHelp" placeholder="Enter your real name">
                        <button
                            onclick="
                                window
                                .location
                                .href='<?php echo "$http/actions/crud/user/update.php"?>'
                                +'?id=<?php echo $user->getId();?>'+
                                '&field=real_name'+
                                '&value='+document.getElementById('real_name').value
                                ;
                            "
                            class="btn btn-info">
                            Update real name
                        </button>
                    </label>
                </div>

                <div class="col">
                    <label for="surnames">Surnames (Current: <?php echo $user->getSurnames();?>)
                        <input type="text" class="form-control" id="surnames" name="surnames" aria-describedby="emailHelp" placeholder="Enter your surnames">
                        <button
                            onclick="
                                window
                                .location
                                .href='<?php echo "$http/actions/crud/user/update.php"?>'
                                +'?id=<?php echo $user->getId();?>'+
                                '&field=surnames'+
                                '&value='+document.getElementById('surnames').value
                                ;
                                "
                            class="btn btn-info">
                            Update surnames
                        </button>
                    </label>
                </div>

            </div>
            <div class="form-row">
                <div class="col">
                    <label for="dni">DNI (Current: <?php echo $user->getDni();?>)
                        <input type="text" class="form-control" id="dni" name="dni" aria-describedby="emailHelp" placeholder="Enter your DNI id">
                        <button
                            onclick="
                                window
                                .location
                                .href='<?php echo "$http/actions/crud/user/update.php"?>'
                                +'?id=<?php echo $user->getId();?>'+
                                '&field=dni'+
                                '&value='+document.getElementById('dni').value
                                ;
                                "
                            class="btn btn-info">
                            Update dni
                        </button>
                    </label>
                </div>

                <div class="col">
                    <label for="telephone_number">Telephone number (Current: <?php echo $user->getTelephoneNumber();?>)
                        <input type="tel" class="form-control" id="telephone_number" name="telephone_number" aria-describedby="emailHelp" placeholder="Enter your phone number">
                        <button
                            onclick="
                                window
                                .location
                                .href='<?php echo "$http/actions/crud/user/update.php"?>'
                                +'?id=<?php echo $user->getId();?>'+
                                '&field=telephone_number'+
                                '&value='+document.getElementById('telephone_number').value
                                ;
                                "
                            class="btn btn-info">
                            Update telephone number
                        </button>
                    </label>
                </div>

            </div>
            <div class="form-row">
                <div class="col">
                    <label for="email">Email (Current: <?php echo $user->getEmail();?>)
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email">
                        <button
                            onclick="
                                if($('#email').val()===$('#emailRepeat').val()){
                                    window
                                    .location
                                    .href='<?php echo "$http/actions/crud/user/update.php"?>'
                                    +'?id=<?php echo $user->getId();?>'+
                                    '&field=email'+
                                    '&value='+document.getElementById('email').value
                                    ;
                                } else
                                    alert('The emails don\'t match');
                                "
                            class="btn btn-info">
                            Update email
                        </button>

                    </label>
                </div>
                <div class="col">
                    <label for="emailRepeat">Repeat:
                    <input type="email" class="form-control" id="emailRepeat" name="emailRepeat" aria-describedby="emailHelp" placeholder="Repeat your email">
                    </label>
                </div>

            </div>
            <div class="form-row">
                <div class="col">
                    <label for="username">Username (Current: <?php echo $user->getUsername();?>)
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter your username">
                        <button
                            onclick="
                                window
                                .location
                                .href='<?php echo "$http/actions/crud/user/update.php"?>'
                                +'?id=<?php echo $user->getId();?>'+
                                '&field=username'+
                                '&value='+document.getElementById('username').value
                                ;
                                "
                            class="btn btn-info">
                            Update username
                        </button>
                    </label>
                </div>

            </div>
            <div class="form-row">
                <div class="col">
                    <label for="password">New password:
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Enter your password">
                        <button
                            onclick="
                                if($('#password').val()===$('#passwordRepeat').val()){
                                    window
                                    .location
                                    .href='<?php echo "$http/actions/crud/user/update.php"?>'
                                    +'?id=<?php echo $user->getId();?>'+
                                    '&field=telephone_number'+
                                    '&value='+document.getElementById('telephone_number').value
                                    ;
                                }else
                                alert('The passwords don\'t match');
                                "
                            class="btn btn-info">
                            Update password
                        </button>
                    </label>
                </div>
                <div class="col">
                    <label for="passwordRepeat">Repeat:
                        <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat" aria-describedby="emailHelp" placeholder="Repeat your password">

                    </label>
                </div>


            </div>

            <!--
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input">
                Check me out
              </label>
            </div>
              -->
<!--            <button type="submit" class="btn btn-primary">Submit</button>-->
<!--        </form>-->
</div>


<?php include "$root/views/layouts/footer.php" ?>
<?php include "$root/views/layouts/body_scripts.php"?>
</body>
</html>