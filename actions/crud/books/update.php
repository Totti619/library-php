<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 21/01/2018
 * Time: 19:34
 */
include "../../../libs/bootstrap.php";

use Library\Database\Model\Book;

Book::update($_GET["field"],$_GET["value"],"isbn",$_GET["id"]);
header("Location: ".\Library\Configuration::http()."/views/book_page_view.php?isbn=".$_GET['id']);
