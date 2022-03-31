<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>complete</title>
  </head>
  <body>


  hi
  <?php
    if(!isset($_POST['singoutChoice'])) {
        header("Location: home.php");
    } else {
      $choice = $_POST['singoutChoice'];
      echo "<h1>$choice</h1>";
    }

   ?>



  <a class="text-light fs-1" href="index.php?page=home" role="button">swip card</a>

  </body>
</html>
