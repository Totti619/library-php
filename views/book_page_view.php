<?php
include "../libs/bootstrap.php";
use Library\Configuration;
$root=Configuration::root();
$http=Configuration::http();
use Library\Database\Model\Author;
use Library\Database\Model\Book;
use Library\Database\Model\BookAuthor;
use Library\Database\Model\BookGenre;
use Library\Database\Model\Country;
use Library\Database\Model\Editorial;
use Library\Database\Model\Genre;
use Library\Database\Model\Language;

$book=Book::get($_GET['isbn']);
$country=Country::get($book->getCountry());
$editorial=Editorial::get($book->getEditorial());

$resAuthors=BookAuthor::select("author","book=".$book->getIsbn());
$authorsString="";
$authors=[];
while($row=$resAuthors->fetch_array())
    $authors[]=Author::get($row["author"]);
$comma=false;
foreach ($authors AS $item){
    if($comma)
        $authorsString.=", ".$item->getName();
    else
        $authorsString.=$item->getName();
    $comma=true;
}

$resGenre=BookGenre::select("genre","book=".$book->getIsbn());
$genresString="";
$genres=[];
while($row=$resGenre->fetch_array())
    $genres[]=Genre::get($row["genre"]);
$comma=false;
foreach ($genres AS $item){
    if($comma)
        $genresString.=", ".$item->getName();
    else
        $genresString.=$item->getName();
    $comma=true;
}




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
            <section class="row">

                <article class="col-xs-12 col-sm-12 col-lg-8">
                    <h1><?php echo $book->getTitle();?></h1>
                    <p>ISBN: <?php echo $book->getIsbn();?></p>
                    <p>Country: <?php echo $country->getName();?></p>
                    <p>Year: <?php echo $book->getYear()?></p>
                    <p>Author/s: <?php echo $authorsString;?></p>
                    <p>Genre/s: <?php echo $genresString;?></p>
                    <p>Edition: <?php echo $book->getEdition()?></p>
                    <p>Editorial: <?php echo $editorial->getName()?></p>
<!--                    <div class="col-12 text-center">-->
<!--                        <p style="color: green">This book is in stock!</p>-->
<!--                        <button class="btn btn-primary">Reserve it now!</button>-->
<!--                    </div>-->
<!--                </article>-->
<!--                <article class="col-12">-->
<!--                    <h2 class="text-center">Description:</h2>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque autem beatae consequatur-->
<!--                        cumque debitis dolore dolorem ducimus est ipsam ipsum itaque iure laudantium modi, mollitia-->
<!--                        obcaecati qui repudiandae, totam?</p>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam ducimus eius illo incidunt-->
<!--                        minus nam necessitatibus nisi nobis, officiis pariatur perferendis quam, quo saepe sed similique-->
<!--                        sit suscipit, totam voluptatem.</p>-->
<!--                </article>-->


            </section>
        </div>

<?php include "$root/views/layouts/footer.php"?>

<script src="../js/head/jquery-3.2.1.min.js" charset="utf-8"></script>
<script src="../js/head/moment.js" charset="utf-8"></script>
<script src="../js/head/bootstrap.min.js" charset="utf-8"></script>
    </body>
</html>