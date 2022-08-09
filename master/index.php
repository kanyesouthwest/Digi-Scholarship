<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Sign out system</title>
  <link rel="stac-icon" href="photo/StACLogoWhite1.png"/>
  <!-- Bootstrap link -->
  <link rel="stylesheet" href="Bootstrap/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Link to custom stylesheet -->
  <link rel="stylesheet" href="custom.css">
  <!-- link to google icons -->
  <link rel="stylesheet" href="Bootstrap/icon.css">
  <!-- Link to manifest -->
  <link rel="manifest" href="app/manifest.json"/>


</head>
  <body>
    
    <?php

      date_default_timezone_set('Pacific/Auckland');
      include("dbconnect.php");

    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      include("$page.php");
    } else {
      include("scan.php");
    }
    ?>
    <!-- Link to Javascript for Bootstrap -->
    <script src="bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="app/app.js"></script>
  </body>
</html>
