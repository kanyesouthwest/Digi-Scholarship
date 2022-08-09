<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>buttons</title>
  </head>
  <body>


    <?php
    session_start();

    // Check if submit form without entering ID
    if(empty($_POST['student_ID'])) {
      header("Location:index.php?page=scan");
    } else {

      // Declare variable using ID from form
      $_SESSION['student_ID'] = $_POST['student_ID'];
      $student_ID = $_POST['student_ID'];

      // Select all information depnding on ID
      $student_sql = "SELECT * FROM student_details WHERE student_ID = $student_ID";
      $student_qry = mysqli_query($dbconnect, $student_sql);
      $student_aa = mysqli_fetch_assoc($student_qry);

      // Confirm if sudent has/has not signed out
      $search_sql = "SELECT * FROM student_log WHERE student_ID = $student_ID";
      $search_qry = mysqli_query($dbconnect,$search_sql);
      $search_aa = mysqli_fetch_assoc($search_qry);

      // Selects latest time specific student signed out
      $order_sql = "SELECT * FROM student_log WHERE student_ID = $student_ID ORDER BY time_out DESC LIMIT 1";
      $order_qry = mysqli_query($dbconnect,$order_sql);
      $order_aa = mysqli_fetch_assoc($order_qry);

      if (mysqli_num_rows($student_qry) == 0 ) {
        header("Location:index.php?page=no_id");
      } else {

      // If student has signed out before
      if (mysqli_num_rows($search_qry) != 0 ) {

        // Varible if they are in school or not
        // 1 = IN
        // 2 = OUT
        $student_status = $order_aa['in_school'];
      }

        if (isset($student_status) && $student_status == 2) {

        // Update student record with time in
        $sign_in_sql = "UPDATE student_log SET time_in = (NOW()), in_school = 1 WHERE student_ID = $student_ID ORDER BY time_out DESC LIMIT 1";
        $sign_in_qry = mysqli_query($dbconnect, $sign_in_sql);

        $get_group_sql = "SELECT group_ID FROM student_transactions WHERE student_ID = $student_ID ORDER BY group_ID DESC LIMIT 1";
        $get_group_qry = mysqli_query($dbconnect, $get_group_sql);
        $get_group_aa = mysqli_fetch_assoc($get_group_qry);

        $non_unique_group_ID = $get_group_aa['group_ID'];

        $sign_in_transaction_sql = "INSERT INTO student_transactions (group_ID, student_ID, time_in) VALUES ('$non_unique_group_ID','$student_ID', (NOW()))";
        $sign_in_transaction_qry = mysqli_query($dbconnect, $sign_in_transaction_sql);

        header("Location:index.php?page=signed_in");
      } else {
    ?>

    <!-- the contaner to hold the page -->
    <div class="container-fluid d-flex align-items-cente justify-content-center vstack" style="text: rgb(0, 49, 85);">

      <!-- the begining of the form -->
      <form class="" action="index.php?page=signed_out"  method="post">

        <!-- row to hold form  -->
        <div class="row p-5 hm-5 d-flex align-items-cente justify-content-center">


        <!-- col for the seletchon cards -->
        <div class="col-9 p-5">


        <!-- row for top 3 cards -->
        <div class="row d-flex align-items-cente justify-content-center ">


          <!-- card1 custom as well -->
          <div class="col-auto">

                <!-- input with the label -->
                <input class="btn-check form-check" type="radio" name="reason" value="custom" id="card1" disabled required>
                <label class="btn card d-flex btn-outline-info" for="card1" style="height: 300px; width: 300px;" >

                    <!-- icon -->
                    <div class="col-12" >
                      <i class="material-icons md-large ">edit</i>
                    </div>

                    <!-- text -->
                    <div class="col-12">
                      <span style="font-size: 250%;">CUSTOM</span>
                    </div>
                </label>

          </div>


          <!-- card2 -->
          <div class="col-auto">

                <!-- input with the label -->
                <input class="btn-check form-check" type="radio" name="reason" value="Sport" id="card2" disabled required>
                <label class="btn card btn-outline-info" for="card2" style="height: 300px; width: 300px;" >

                      <!-- icon -->
                      <div class="col-12">
                        <i class="material-icons md-large ">sports_basketball</i>
                      </div>

                      <!-- text -->
                      <div class="col-12">
                        <span style="font-size: 250%;">SPORTS</span>
                      </div>

                </label>

          </div>

          <!-- card3 -->
          <div class="col-auto">

                <!-- input with the label -->
                <input class="btn-check " type="radio" name="reason" value="Sick" id="card3" disabled required>
                <label class="btn card btn-outline-info ratio" for="card3" style="height: 300px; width: 300px;" >
                  <div class="row-4">

                    <!-- icon -->
                    <div class="col-12 " >
                      <i class="material-icons md-large ">sick</i>
                    </div>

                    <!-- text -->
                    <div class="col-12 ">
                      <span style="font-size: 250%;">SICK</span>
                    </div>
                  </div>
                </label>

          </div>

        </div>



        <!-- row for botom 3 cards -->
        <div class="row d-flex align-items-cente justify-content-center ">


          <!-- card4 -->
          <div class="col-auto">

                <!-- input with the label -->
                <input class="btn-check form-check" type="radio" name="reason" value="Doctor" id="card4" disabled required>
                <label class="btn card d-flex btn-outline-info" for="card4" style="height: 300px; width: 300px;" >

                    <!-- icon -->
                    <div class="col-12" >
                      <i class="material-icons md-large ">medication</i>
                    </div>

                    <!-- text -->
                    <div class="col-12">
                      <span style="font-size: 250%;">DOCTOR</span>
                    </div>
                </label>
          <!-- closes card 4 -->
          </div>


          <!-- card5 -->
          <div class="col-auto">

                <!-- input with the label -->
                <input class="btn-check form-check" type="radio" name="reason" value="School Trip" id="card5" disabled required>
                <label class="btn card btn-outline-info" for="card5" style="height: 300px; width: 300px;" >

                      <!-- icon -->
                      <div class="col-12">
                        <i class="material-icons md-large ">directions_bus_filled</i>
                      </div>

                      <!-- text -->
                      <div class="col-12">
                        <span style="font-size: 250%;;">SCHOOL TRIP</span>
                      </div>

                </label>
          <!-- closes card 5 -->
          </div>

          <?php
            if ($student_aa['year'] == 13 ) {
          ?>
          <!-- card 6 Y13 -->
          <div class="col-auto">

                <!-- input with the label -->

                <input class="btn-check " type="radio"  name="reason" value="Lunch" id="card6" required >
                <label class="btn card btn-outline-info"  for="card6" style="height: 300px; width: 300px;" >
                  <div class="row-4">

                    <!-- icon -->
                    <div class="col-12 " >
                      <i class="material-icons md-large ">restaurant</i>
                    </div>

                    <!-- text -->
                    <div class="col-12 ">
                      <span style="font-size: 250%;">LUNCH</span>
                    </div>
                  </div>
                </label>
          <!-- closes card 6 Y13-->
          </div>


          <?php
            } if ($student_aa['year'] == 12 ) {
          ?>
          <!-- card 6 Y12 -->
          <div class="col-auto">

            <!-- input with the label -->
            <input class="btn-check " type="radio"  name="reason" value="Lunch" id="card6" disabled >
            <label class="btn card btn-outline-info"  for="card6" style="height: 300px; width: 300px;" >
              <div class="row-4">

                <!-- icon -->
                <div class="col-12 " >
                  <i class="material-icons md-large ">restaurant</i>
                </div>

                <!-- text -->
                <div class="col-12 ">
                  <span style="font-size: 250%;">LUNCH</span>
                </div>
              </div>
            </label>
            <!-- closes card 6 Y12 -->
            </div>
            <?php } ?>


      <!-- close botome 3 cards -->
      </div>
    <!-- closes selection cards -->
    </div>

        <!-- col for side colom -->
        <div class="col-3 p-5" >
          <!-- the side bar -->
          <div class="col gap-5 roundedconners border border-5 border-light d-flex align-items-cente justify-content-center overflow-hidden vstack" style="height: 100%">

            <!-- names -->
            <div class="row bg-light d-flex align-items-cente justify-content-center display-6 p-1">
              <!-- frist name -->
              <div class="col-12 d-flex align-items-cente justify-content-center">
              <?php
                  echo $student_aa['first_name'];
              ?>
              </div>

              <!-- last_name -->
              <div class="col-12 d-flex align-items-cente justify-content-center display-6">
              <?php
                  echo $student_aa['last_name'];
              ?>
              </div>
            <!-- close names -->
            </div>

            <!-- submit button -->
            <div class="col-12 d-flex align-items-cente justify-content-center">
              <button type="button " class="rounded-circle bg-success border border-0 text-light fs-2 text-uppercase fw-bold" name="button" style="height: 200px; width: 200px;">Submit</button>
            </div>

            <!-- bake button -->
            <div class="col-12 d-flex align-items-cente justify-content-center">
                <!-- link with a button inside it -->
                <a href="index.php?page=scan"> <button type="button" class=" text-decoration-none rounded-circle bg-danger border border-0 text-light fs-2 text-uppercase fw-bold"  name="back button" style="height: 150px; width: 150px;">back</button> </a>

            </div>

          <!-- closes the side bare -->
          </div>
        <!-- closes col to hold sidebar -->
        </div>

      </div>
    </form>
  <?php }}} ?>
  </body>
</html>
