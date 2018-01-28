<?php

/**
 * Created by PhpStorm.
 * User: Antonio Ortiz
 * Date: 17/10/2017
 * Time: 20:46
 */
namespace Library\Book;

use Library\Database\Model;
use Library\Database\Model\Author;
use Library\Database\Model\Book;
use Library\Database\Model\BookAuthor;
use Library\Database\Model\BookGenre;
use Library\Database\Model\Country;
use Library\Database\Model\Editorial;
use Library\Database\Model\Genre;
use Library\Database\Model\Language;

abstract class BookController
{
    public static function insertCountry($arg)
    {
        return ($var = new Country($arg))->insert();
    }

    public static function insertEditorial($arg)
    {
        return ($var = new Editorial($arg))->insert();
    }

    public static function insertLanguage($arg)
    {
        return ($var = new Language($arg))->insert();
    }

    public static function insert(
        $isbn = 6666666666666,
        $title = "Sample Book",
        $authors = ["Author 1", "Author 2"],
        $genres = ["Novel", "Story"],
        $year = 2000,
        $edition = 1,
        $editionYear = 2000,
        $editorial = "Sample Editorial",
        $country = "Spain",
        $language = "Spanish"
    ) {
        echo self::insertCountry($country);
        echo self::insertEditorial($editorial);
        echo self::insertLanguage($language);

        ($book = new Book(
            $isbn, $title, $year, $edition, $editionYear, $editorial, $country, $language
        ))->insert();

        foreach ($authors AS $authorName) {
            ($author = new Author($authorName))->insert();
            $lastId = Model::getLast(Author::getTableName(), 'id')->fetch_assoc();
            echo $lastId;
            ($bookAuthor = new BookAuthor($isbn, $lastId))->insert();
        }
        foreach ($genres AS $genreName) {
            echo ($genres = new Genre($genreName))->insert();
            $lastId = Model::getLast(Genre::getTableName(), 'id')->fetch_assoc();
            echo $lastId;
            ($bookGenre = new BookGenre($isbn, $lastId))->insert();
        }
    }

    public static function getAll()
    {
        return Book::select();
    }

//    public static function printAll()
//    {
//        $books = self::getAll();
//        $html  = "<table>";
//        $html .=    "<thead>";
//                        foreach ($books as $key => $value) $html .= "<th>$key</th>";
//        $html .=    "</thead>";
//        $html .=    "<tbody>";
//        foreach ($books as $book) {
//            $html .=    "<tr>";
//                            foreach($book as $column) $html .= "<td>$column</td>";
//            $html .=    "</tr>";
//        }
//        $html .=    "</tbody>";
//        $html .= "</table>";
//        echo $html;
//        return $html;
//    }
}