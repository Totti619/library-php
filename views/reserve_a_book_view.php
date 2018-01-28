<?php
include "../libs/bootstrap.php";
use Library\Configuration;
use Library\Book\BookController;
use Library\Database\Model\Book;
use Library\Database\Model\Country;
use Library\Database\Model\Editorial;
use Library\Database\Model\Language;
use Library\Database\Model\Reservation;
use Library\Database\Model\User;

$root=Configuration::root();
$http=Configuration::http();
Configuration::get();

$rows=Book::getAll();
usort($rows,function ($a){
    return $a->isInStock()?-1:1;
});

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

<div class="container-fluid">
    <div class="row">
        <p>
            Actions
        </p>
<!--        <div>-->
<!--            <a href="--><?php //echo "$http/views/add_a_book.php"?><!--" class="btn btn-primary">Add a book</a>-->
<!--        </div>-->
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Edition</th>
                    <th>Language</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Edition</th>
                    <th>Language</th>
                </tr>
            </tfoot>
            <tbody>
                    <?php if($rows !== false) foreach($rows AS $row): $isbn=$row->getIsbn()?>
                        <tr>
                            <td><?php echo $row->getTitle(); ?></td>
                            <td><?php echo $row->getEdition(); ?></td>
                            <td><?php echo (Language::get($row->getLanguage()))->getName(); ?></td>
                            <td>
                                <a href="<?php echo "$http/views/book_page_view.php?isbn=$isbn"?>">
                                    <button class="btn btn-info btn-xs">
                                        <i class="material-icons">info</i>
                                        More info
                                    </button>
                                </a>
                            </td>
                            <td>
                                <?php if($row->isInStock()):?>
                                <a href="<?php echo "$http/views/select_date_view.php?isbn=$isbn"?>">
                                    <button class="btn btn-success btn-xs">
                                        <i class="material-icons">book</i>
                                        Reserve it now!
                                    </button>
                                </a>
                                <?php else:?>
                                <p style="color:red">Out of stock.</p>
                                <?php endif;?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
        </table>
    </div>
</div>

<?php include "$root/views/layouts/footer.php"?>

<script src="../js/head/jquery-3.2.1.min.js" charset="utf-8"></script>
<script src="../js/head/moment.js" charset="utf-8"></script>
<script src="../js/head/bootstrap.min.js" charset="utf-8"></script>

</body>
</html>