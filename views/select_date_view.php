<?php
include "../libs/bootstrap.php";
use Library\Configuration;
use Library\Database\Model\Book;

$root=Configuration::root();
$http=Configuration::http();


$isbn=$_GET["isbn"];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <?php include "$root/views/layouts/links.php" ?>
    <?php include "$root/views/layouts/head_scripts.php"?>

    <title>Books - Library</title>
</head>
<body>

<?php include "$root/views/layouts/user_bar.php"?>
<?php include "$root/views/layouts/nav.php" ?>

<div class="container">
    <div class="row">
        <form action="<?php echo "$http/actions/crud/reservation/insert.php";?>">
            <input type="hidden" name="isbn" value="<?php echo $isbn;?>">
            <input type="hidden" name="user" value="<?php echo $_SESSION["id"];?>">
            <label for="date">
                Please, select the day you are going to take the book "<?php echo Book::get($isbn)->getTitle()?>".
                <br><input class="" type="date" name="date" value="<?php echo (new DateTime())->format('Y-m-d');?>" min="<?php echo (new DateTime())->format('Y-m-d');?>">
            </label>
            <input class="btn btn-primary" type="submit" value="Reserve">
        </form>
    </div>
</div>

<?php include "$root/views/layouts/footer.php"?>

<script src="../js/head/jquery-3.2.1.min.js" charset="utf-8"></script>
<script src="../js/head/moment.js" charset="utf-8"></script>
<script src="../js/head/bootstrap.min.js" charset="utf-8"></script>

</body>
</html>