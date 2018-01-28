<!--
Book:
    isbn
    title
    year
    edition
    edition_year
    editorial
    country
    language
    authors (checkboxes?)
    genres
-->
<?php
if(isset($_SESSION)){
    session_start();
}
include "../libs/bootstrap.php";
use Library\Configuration;
use Library\Database\Model\Country;
use Library\Database\Model\Editorial;
use Library\Database\Model\Language;
use Library\Database\Model\Genre;
use \Library\Database\Model\Author;
$root=Configuration::root();
$http=Configuration::http();
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
        <form action="<?php echo "$http/actions/crud/books/insert_book.php?";?>" method="post" onsubmit="">
            <script type="text/javascript">
                var genres=[],authors=[];
            </script>
            <input type="hidden" id="genresHidden" name="genresHidden" value="">
            <input type="hidden" id="authorsHidden" name="authorsHidden" value="">


            <div class="form-row form-group">
                <div class="col">
                    <label for="isbn">ISBN:</label>
                        <input type="number" class="form-control" id="isbn" name="isbn">

                </div>
                <div class="col">
                    <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title">

                </div>
            </div>
            <div class="form-row form-group">
                <div class="col">
                    <label for="year">Year:</label>
                        <input type="number" class="form-control" id="year" name="year" min="1" max="9999">

                </div>
                <div class="col">
                    <label for="edition">Edition:</label>
                        <input type="number" class="form-control" id="edition" name="edition" min="1">

                </div>
                <div class="col">
                    <label for="edition_year">Edition year:</label>
                        <input type="number" class="form-control" id="edition_year" name="edition_year" min="1" max="9999">

                </div>
                <div class="col">
                    <label for="author">Authors: <span id="authorsDisplayed"></span></label>
                    <select class="form-control" id="author" name="author">
                        <?php foreach(Author::select("id, name") AS $row):?>
                            <option value="<?php echo $row['id'];?>">
                                <?php echo $row['name'];?>
                            </option>
                        <?php endforeach;?>
                    </select>
                    <button style="margin:0" type="button" class="btn btn-primary" onclick="
                            var author=$('#author option:selected');
                            $('#authorsDisplayed').append(author.text().trim());
                            authors.push(author.val());
                            $('#authorsHidden').val(authors.toString());
                        ">Add</button>
                    <a href="<?php echo "$http/views/add_a_author.php"?>">New author</a>
                </div>
            </div>
            <div class="form-row form-group">
                <div class="col">
                    <label for="editorial">Editorial:</label>
                        <select class="form-control" id="editorial" name="editorial">
                            <?php foreach(Editorial::select("id, name") AS $row):?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    <a href="<?php echo "$http/views/add_a_editorial.php"?>">New editorial</a>

                </div>
                <div class="col">
                    <label for="country">Country:</label>
                        <select class="form-control" id="country" name="country">
                            <?php foreach(Country::select("id, name") AS $row):?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    <a href="<?php echo "$http/views/add_a_country.php"?>">New country</a>

                </div>
                <div class="col">
                    <label for="language">Language:</label>
                        <select class="form-control" id="language" name="language">
                            <?php foreach(Language::select("id, name") AS $row):?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                            <?php endforeach;?>
                        </select>
                    <a href="<?php echo "$http/views/add_a_language.php"?>">New language</a>

                </div>
                <div class="col">
                    <label for="genre">Genres: <span id="genresDisplayed"></span></label>
                        <select class="form-control" id="genre" name="genre">
                            <?php foreach(Genre::select("id, name") AS $row):?>
                                <option value="<?php echo $row['id'];?>">
                                    <?php echo $row['name'];?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    <button style="margin:0" type="button" class="btn btn-primary" onclick="
                            var genre=$('#genre option:selected');
                            $('#genresDisplayed').append(genre.text().trim());
                            genres.push(genre.val());
                            $('#genresHidden').val(genres.toString());
                        ">Add</button>
                    <a href="<?php echo "$http/views/add_a_genre.php"?>">New genre</a>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12 col-md-6">
                    <input type="reset" class="form-control btn btn-danger" value="Clear all fields">
                </div>
                <div class="col-sm-12 col-md-6">
                    <input type="submit" class="form-control btn btn-primary" value="Insert this book">
                </div>
            </div>
        </form>
    </section>
</div>


<?php include "$root/views/layouts/footer.php" ?>
<?php include "$root/views/layouts/body_scripts.php"?>
</body>
</html>