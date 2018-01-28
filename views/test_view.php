<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <?php include_once 'layouts/links.php' ?>

    <title>Home - Library</title>
</head>
<body>

<?php include 'layouts/nav.php' ?>

<!--breadcrumbs-->
<ol class="breadcrumb" style="margin: 10px; ">
    <li class="breadcrumb-item active"><a href="index.html">You are in: Home</a></li>
</ol>

<div class="container">
    <section class="row">
        <div class="col-12">
            <table class="table table-primary table-bordered table-responsive table-hover">
                <?php
                insertBook();
                ?>
            </table>
        </div>
    </section>
</div>

<?php include 'layouts/footer.php' ?>

<script src="../js/head/jquery-3.2.1.min.js" charset="utf-8"></script>
<script src="../js/head/moment.js" charset="utf-8"></script>
<script src="../js/head/bootstrap.min.js" charset="utf-8"></script>

</body>
</html>