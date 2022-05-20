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

<div class="container d-flex align-items-center justify-content-center vstack text-light">



  <h1>SWIPE CARD</h1>

    <form action="index.php?page=reason" method="post">
        <div class="form-group">
              <label for="student_ID"></label>
              <input name="student_ID" type="number" autofocus="on" autocomplete="off" class="form-control border border-0 bg-success" onblur="this.focus()" style="--bs-bg-opacity: .0;">
        </div>
    </form>

</div>



  </body>
</html>
