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
                <a href="<?php echo "$http/views/add_a_book.php"?>" class="btn btn-primary">Add a book</a>
            </div>
        </div>
        <div class="row">
                <table class="table">
                    <?php
                    $columns = Book::columns();
                    $rows = BookController::getAll();
                    ?>
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
                    <?php if($rows !== false) while($row = $rows->fetch_assoc()): ?>
                        <tr>
                            <?php foreach($row as $key => $value): ?>
                                <td>
                                    <?php
                                    if ($key === "isbn") $isbn = $value;
                                    if ($key === "editorial")
                                        echo Editorial::select("name", "id = $value")->fetch_assoc()['name'];
                                    else if ($key === "country")
                                        echo Country::select("name", "id = $value")->fetch_assoc()['name'];
                                    else if ($key === "language")
                                        echo Language::select("name", "id = $value")->fetch_assoc()['name'];
                                    else
                                        echo $value;
                                    ?>
                                </td>
                            <?php endforeach; ?>
                            <td>
                                <a href="<?php echo "$http/views/copies_view.php?isbn=$isbn"?>">
                                    <button class="btn btn-block btn-xs">
                                        <i class="material-icons">settings</i>
                                        Copies
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo "$http/views/book_page_view.php?isbn=$isbn"?>">
                                    <button class="btn btn-primary btn-xs">
                                        <i class="material-icons">settings</i>
                                        Go to book page
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="#" onclick="
                                   if(confirm('Warning: this action will delete FOREVER this book and all its relations. Do you wish to continue?'))
                                        window.location='<?php echo "$http/actions/crud/books/delete_book.php"?>'+
                                        '?isbn='+'<?php if (isset($isbn)) echo $isbn;?>';
                                ">
                                    <button class="btn btn-danger btn-xs">
                                        <i class="material-icons">delete forever</i>
                                        Delete this book
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