<head>
  <?php 
    session_start()
  ?>
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

      <?php 
        // Get variable from session 
        $student_name = $_SESSION["student_name"];
      ?>

      <!-- text box for swipe card -->
      <div class="col-12 d-flex align-items-center justify-content-center roundedconners border border-5 overflow-hidden vstack" style="height: 200px; width: 600px;">
        <p class="text-light display-1">
          <?php echo $student_name ?>
        </p> 
        <p> has signed <b>in</b></p> 
        <p>You will be redirected in 2 seconds</p>
      </div>
      <?php
        // unset session when finished  
        unset($_SESSION['student_name']);
      ?>

    <!-- row to hold logo and text box closee-->
    </div>

    <!-- Form for if card is swiped on this page -->
    <form action="index.php?page=reason" method="post">
      <div class="form-group">
        <label for="student_ID"></label>
        <input name="student_ID" type="number" autofocus="on" autocomplete="off" class="form-control border border-0 bg-success " onblur="this.focus()" style=" color: rgba(0,0,0,0); --bs-bg-opacity: .0;">
      </div>
    </form>




  <!-- contaner close-->
  </div>

  <?php
    header('Refresh:2 ; URL=index.php?page=scan');
  ?>

</body>
