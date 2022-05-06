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

  <body style="background-color: rgb(0,65,122);">

<div class="container-fluid">

  <div class="row">
    <div class=" col-12 border d-flex align-items-center justify-content-center" style="height: 1080px; width: 1920px;">
      <div class="row d-flex align-items-center justify-content-center">

        <div class="col-12 border border-4 border-light rounded-1 d-flex align-items-center justify-content-center " style="height: 200px; width: 600px;">
          <p class="text-light fs-1" href="index.php?page=buttonns" role="button">Swipe card</p>
        </div>

        <div class="col-12 ">
          <form action="index.php?page=reason" method="post">
            <div class="form-group">
                <label for="student_ID"></label>
                <input name="student_ID" type="number" autofocus="on" autocomplete="off" class="form-control border border-0 bg-success" onblur="this.focus()" style="--bs-bg-opacity: .0;">
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

</div>

  </body>
</html>
