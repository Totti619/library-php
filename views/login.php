<?php
include "../libs/bootstrap.php";
use Library\Configuration;
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
<?php //include "$root/views/layouts/user_bar.php"?>
<!--    --><?php //include "$root/views/layouts/nav.php" ?>

      <div class="container" style="margin-top: 200px">
          <form action="<?php echo "$http/actions/session/login.php" ?>" method="POST">
              <div class="form-group">
                <label for="username">Your username:</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter your username">
                <small id="emailHelp" class="form-text text-muted">We'll never share your personal data with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="password">Your password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <a href="register.php">Don't have an account? Register here!</a>
      </div>

    <?php include "$root/views/layouts/footer.php" ?>

      <script src="../js/head/jquery-3.2.1.min.js" charset="utf-8"></script>
      <script src="../js/head/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
