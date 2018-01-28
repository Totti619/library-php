<?php
/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 24/10/2017
 * Time: 20:43
 */
include "../../../libs/bootstrap.php";
use Library\Database\Model\Book;
use Library\Configuration;
$http=Configuration::http();
\Library\Database\Model\BookAuthor::delete('book', $_GET['isbn']);
\Library\Database\Model\BookGenre::delete('book', $_GET['isbn']);
\Library\Database\Model\BookCopy::delete('book', $_GET['isbn']);
Book::delete('isbn', $_GET['isbn']);
header("Location: $http/views/books.php");