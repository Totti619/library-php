<?php
include "../libs/bootstrap.php";
use Library\Configuration;
use Library\Book\BookController;
use Library\Database\Model\Book;
use Library\Database\Model\BookCopy;
use Library\Database\Model\Country;
use Library\Database\Model\Editorial;
use Library\Database\Model\Language;
use Library\Database\Model\Reservation;
use Library\Database\Model\User;

$root=Configuration::root();
$http=Configuration::http();
Configuration::get();

$columns=Reservation::columns();
$rows=Reservation::select();

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
        <table class="table">
            <thead>
            <tr>
                <?php foreach($columns as $column): ?>
                    <th>
                        <?php echo ucfirst($column); ?>
                    </th>
                <?php endforeach; ?>
            </tr>
            </thead>
            <tbody>
            <?php if($rows !== false) while($row = $rows->fetch_assoc()): $id=$row["id"]?>
                <tr>
                    <?php foreach($row as $key => $value): ?>
                        <td>
                            <?php
                            if ($key === "user")
                                echo (User::get($value))->getUsername();
                            else if($key==="book_copy")
                                echo Book::get((BookCopy::get($value))->getBook())->getTitle()."#".$value;
                            else if($value!=="0000-00-00 00:00:00")
                                echo $value;
                            else echo "Not set";
                            ?>
                        </td>
                    <?php endforeach; ?>
                    <?php if($row["take_time"]==="0000-00-00 00:00:00"):?>
                        <td>
                            <a href="<?php echo "$http/actions/crud/reservation/update.php?action=take_time&id=$id"?>">
                                <button class="btn btn-primary btn-xs">
                                    Book taken?
                                </button>
                            </a>
                        </td>
                    <?php elseif($row["return_time"]==="0000-00-00 00:00:00"):?>
                        <td>
                            <a href="<?php echo "$http/actions/crud/reservation/update.php?action=return_time&id=$id"?>">
                                <button class="btn btn-success btn-xs">
                                    Book returned?
                                </button>
                            </a>
                        </td>
                    <?php else:?>
                        <td>
                                <button class="btn btn-block disabled btn-xs">
                                    Book returned
                                </button>
                        </td>
                    <?php endif;?>

                    <td>
                        <a href="#" onclick="
                            if(confirm('Warning: this action will delete FOREVER this book and all its relations. Do you wish to continue?'))
                            window.location='<?php echo "$http/actions/crud/reservation/delete.php"?>'+
                            '?id='+'<?php if (isset($id)) echo $id;?>';
                            ">
                            <button class="btn btn-danger btn-xs">
                                <i class="material-icons">delete forever</i>
                                Delete this reservation
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
            <tfoot>
            <tr>
                <?php foreach($columns as $column): ?>
                    <th>
                        <?php echo ucfirst($column); ?>
                    </th>
                <?php endforeach; ?>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<?php include "$root/views/layouts/footer.php"?>

<script src="../js/head/jquery-3.2.1.min.js" charset="utf-8"></script>
<script src="../js/head/moment.js" charset="utf-8"></script>
<script src="../js/head/bootstrap.min.js" charset="utf-8"></script>

</body>
</html>