<?php
include "../libs/bootstrap.php";
use Library\Configuration;
$root=Configuration::root();
$http=Configuration::http();
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">

      <?php include "$root/views/layouts/links.php" ?>
      <?php include "$root/views/layouts/head_scripts.php"?>

      <title>-Register - Library</title>
  </head>
  <body>
<!--      --><?php //include 'layouts/nav.php' ?>

      <div class="container">
          <form action="<?php echo "$http/actions/session/register.php" ?>" method="post">

              <div class="form-row">
                  <div class="col">
                      <label for="real_name">Real name:</label>
                      <input type="text" class="form-control" id="real_name" name="real_name" aria-describedby="emailHelp" placeholder="Enter your real name">
                  </div>
                  <div class="col">
                      <label for="surnames">Surname:</label>
                      <input type="text" class="form-control" id="surnames" name="surnames" aria-describedby="emailHelp" placeholder="Enter your surnames">
                  </div>
              </div>
              <div class="form-row">
                  <div class="col">
                      <label for="dni">DNI:</label>
                      <input type="text" class="form-control" id="dni" name="dni" aria-describedby="emailHelp" placeholder="Enter your DNI id">
                  </div>
                  <div class="col">
                      <label for="telephone_number">Telephone number:</label>
                      <input type="tel" class="form-control" id="telephone_number" name="telephone_number" aria-describedby="emailHelp" placeholder="Enter your phone number">
                  </div>
              </div>
              <div class="form-row">
                  <div class="col">
                      <label for="email">Email:</label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email">
                  </div>
                  <div class="col">
                      <label for="emailRepeat">Repeat:</label>
                      <input type="email" class="form-control" id="emailRepeat" name="emailRepeat" aria-describedby="emailHelp" placeholder="Repeat your email">
                  </div>
              </div>
              <div class="form-row">
                  <div class="col">
                      <label for="username">Username:</label>
                      <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter your username">
                  </div>
              </div>
              <div class="form-row">
                  <div class="col">
                      <label for="password">Password:</label>
                      <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Enter your password">
                  </div>
                  <div class="col">
                      <label for="passwordRepeat">Repeat:</label>
                      <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat" aria-describedby="emailHelp" placeholder="Repeat your password">
                </div>
              </div>

              <!--
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input">
                  Check me out
                </label>
              </div>
                -->
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <a href="login.php">Already have an account? Log in!</a>
      </div>

<?php include "$root/views/layouts/footer.php" ?>

      <script src="../js/head/jquery-3.2.1.min.js" charset="utf-8"></script>
      <script src="../js/head/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
