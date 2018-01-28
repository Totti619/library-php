<?php
/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 24/10/2017
 * Time: 20:40
 */
include "../../../libs/bootstrap.php";
use Library\Database\Model\Book;
use Library\Database\Model\BookGenre;
use Library\Database\Model\BookAuthor;
$http=\Library\Configuration::http();


$aux = true;
foreach ($_POST as $index => $item)
    if(!isset($_POST[$index]) || is_null($_POST[$index])) $aux = false;
$cookie=true;
if ($aux) {
    echo($book = new Book(
        $_POST['isbn'],
        $_POST['title'],
        $_POST['year'],
        $_POST['edition'],
        $_POST['edition_year'],
        $_POST['editorial'],
        $_POST['country'],
        $_POST['language']
    ))->insert();
    echo "<br>".$book->getIsbn();
    echo "<br>".$_POST['genresHidden'];
    echo "<br>".explode(",",$_POST['genresHidden'])[0];
    foreach (explode(",",$_POST['genresHidden']) AS $id){
        echo($bookGenre=new BookGenre(
            $book->getIsbn(),
            $id
        ))->insert();
    }
    echo "<br>Authors: ".$_POST['authorsHidden'];
    foreach (explode(",",$_POST['authorsHidden']) AS $id){
        echo($bookGenre=new BookAuthor(
            $book->getIsbn(),
            $id
        ))->insert();
    }
}
header("Location: $http/views/books.php");
