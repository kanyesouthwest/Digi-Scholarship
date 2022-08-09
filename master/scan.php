<?php
  session_start();
  if(isset($_SESSION['student_ID'])) {
    unset($_SESSION['student_ID']);
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>home</title>
  </head>

  <body>

    <!-- contaner -->
    <div class="container-fluid  d-flex align-items-center justify-content-center vstack text-light">
      <!-- row to hold logo and text box -->
      <div class="row g-5 d-flex align-items-center justify-content-center">

        <!-- stac logo -->
        <div class="col-12 d-flex align-items-center justify-content-center">
          <img src="photo/StACLogoWhite.png" class="" alt="StACLogo" style="height: 200px; width: 300px;">
        </div>

        <!-- text box for swipe card -->
        <div class="col-12 d-flex align-items-center justify-content-center roundedconners border border-5" style="height: 200px; width: 600px;">
          <p class="text-light display-2"> <b>SWIPE</b> CARD</p>
        </div>

      <!-- row to hold logo and text box closee-->
      </div>

      <!-- form to hold enter for cards -->
      <form action="index.php?page=reason" method="post">
        <div class="form-group">
          <label for="student_ID"></label>
          <input name="student_ID" type="number" autofocus="on" autocomplete="off" class="form-control border border-0 bg-success " onblur="this.focus()" style=" color: rgba(0,0,0,0); --bs-bg-opacity: .0;">
        </div>
      </form>
      
    <!-- contaner close-->
    </div>

  </body>
</html>
