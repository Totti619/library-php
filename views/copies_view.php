<?php
include "../libs/bootstrap.php";
use Library\Configuration;
$root=Configuration::root();
$http=Configuration::http();
Configuration::get();
use Library\Book\BookController;
use Library\Database\Model\Book;
use Library\Database\Model\Country;
use Library\Database\Model\Editorial;
use Library\Database\Model\Language;
use Library\Database\Model\BookCopy;
use Library\Database\Model\State;
$isbn=$_GET["isbn"];
$columns=BookCopy::columns();
$rows=BookCopy::getAllOfBook($isbn);
usort($rows,function ($a,$b){
    if ($a->getId() == $b->getId())
        return 0;
    return ($a->getId() < $b->getId()) ? 1 : -1;
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
        <div>
            <form action="<?php echo "$http/actions/crud/book_copy/insert.php"?>" method="get">
                <input type="submit" value="Add a copy for this book" class="btn btn-primary"/>
                <input type="hidden" name="isbn" value="<?php echo $isbn;?>"
                <label for="state">State:
                    <select id="state" name="state">
                        <?php foreach(State::select() AS $row):?>
                            <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
                        <?php endforeach;?>
                    </select>
                </label>
            </form>
        </div>
    </div>
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
            <?php if($rows !== false) foreach($rows AS $row): ?>
                <tr>
                    <td>
                        <?php echo $row->getId();?>
                    </td>
                    <td>
                        <?php echo (Book::get($row->getBook()))->getTitle();?>
                    </td>
                    <td>
                        <?php echo (State::get($row->getState()))->getName();?>
                    </td>
                    <td>
                        <form action="<?php echo "$http/actions/crud/book_copy/update.php"?>" method="get">
                            <input type="submit" value="Change its state" class="btn btn-primary"/>
                            <input type="hidden" name="isbn" value="<?php echo $isbn;?>"/>
                            <input type="hidden" name="id" value="<?php echo $row->getId();?>"/>
                            <label for="state">State:
                                <select id="state" name="state">
                                    <?php foreach(State::select() AS $state):?>
                                        <option value="<?php echo $state["id"];?>"><?php echo $state["name"];?></option>
                                    <?php endforeach;?>
                                </select>
                            </label>
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-xs" onclick="
                            if(confirm('Warning: this action will delete FOREVER this book copy and all its relations. Do you wish to continue?'))
                            window.location='<?php echo "$http/actions/crud/book_copy/delete.php"?>'+
                            '?isbn='+'<?php echo $isbn;?>'+
                            '&id='+'<?php echo $row->getId();?>';
                            ">
                                <i class="material-icons">delete forever</i>
                                Delete this copy
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
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