<?php
/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 04/12/2017
 * Time: 20:02
 */
include "../libs/bootstrap.php";
$root=\Library\Configuration::root();
$http=\Library\Configuration::http();
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

<div class="container">
    <section>
        <form action="<?php echo "$http/actions/crud/insert.php?table=genre";?>" method="post">
            <label for="value">Genre:</label>
            <input type="text" id="value" name="value">
            <input type="reset" class="btn btn-danger" value="Clear field">
            <input type="submit" class="btn btn-primary" value="Insert">
        </form>
    </section>
</div>

<?php include "$root/views/layouts/footer.php" ?>
<?php include "$root/views/layouts/body_scripts.php"?>
</body>
</html>

