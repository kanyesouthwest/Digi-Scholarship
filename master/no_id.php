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
                  <div class="col-12 d-flex align-items-center justify-content-center roundedconners border border-5 vstack" style="height: 200px; width: 600px;">
                        <p class="text-light display-1">Card not found</p>
                        <p>You will be redirected in 3 seconds</p>
                  </div>

            <!-- row to hold logo and text box closee-->
            </div>

      <!-- contaner close-->
      </div>

      <?php
            header('Refresh:3 ; URL=index.php?page=home');
      ?>

</body>
