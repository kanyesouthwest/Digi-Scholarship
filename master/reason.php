<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>buttons</title>
  </head>
  <body style="background-color: rgb(0,65,122);">


    <?php
    session_start();
      // Declare variable using ID from form
      // $student_ID = mysqli_real_escape_string($dbconnect, $_POST['student_ID']);

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

        header("Location:index.php?page=sign_in");
      } else {
    ?>

    <!-- the contaner to hold the page -->
    <div class="container-fluid d-flex align-items-cente justify-content-center vstack" style="text: rgb(0, 49, 85);">

      <!-- the begining of the form -->
      <form class="" action="index.php?page=complete "  method="post">


        <!-- row for top 3 cards -->
        <div class="row p-2 d-flex align-items-cente justify-content-center">


          <!-- card1 custom as well -->
          <div class="col-auto">

                <!-- input with the label -->
                <input class="btn-check form-check" type="radio" name="reason" value="custom" id="card1">
                <label class="btn btn-outline-info btn-outline-light border rounded-0 text-bold rounded-start rounded-top bg-light" for="card1" style="height:300px; width: 300px;">

                    <!-- icon -->
                    <div class="col-12" >
                      <i class="material-icons md-large ">edit</i>
                    </div>
                    <!-- text -->
                    <div class="col-12">
                      <span style="font-size: 300%;">CUSTOM</span>
                    </div>
                </label>

          </div>


          <!-- card2 -->
          <div class="col-auto">

                <!-- input with the label -->
                <input class="btn-check " type="radio" name="reason" value="sports" id="card2">
                <label class="btn btn-outline-info btn-outline-light border rounded-0 text-bold rounded-start rounded-top rounded-5" for="card2" style="height:300px; width: 300px">

                      <!-- icon -->
                      <div class="col-12">
                        <i class="material-icons md-large ">sports_basketball</i>
                      </div>

                      <!-- text -->
                      <div class="col-12">
                        <span style="font-size: 300%;">SPORTS</span>
                      </div>

                </label>

          </div>

          <!-- card3 -->
          <div class="col-auto">

                <!-- input with the label -->
                <input class="btn-check " type="radio" name="reason" value="sick" id="card3">
                <label class="btn btn-outline-info btn-outline-light text-nowrap border rounded-0 text-bold" for="card3" style="height:300px; width: 300px" >
                  <div class="row-4">

                    <!-- icon -->
                    <div class="col-12 " >
                      <i class="material-icons md-large ">sick</i>
                    </div>

                    <!-- text -->
                    <div class="col-12 ">
                      <span style="font-size: 300%;">SICK</span>
                    </div>
                  </div>
                </label>

          </div>


          </div>



          <!-- row for botom 3 cards -->
          <div class="row p-2 d-flex align-items-cente justify-content-center">

            <!-- card4 -->
            <div class="col-auto">

                  <!-- input with the label -->
                  <input class="btn-check form-check" type="radio" name="reason" value="custom" id="card4">
                  <label class="btn btn-outline-info btn-outline-light   border rounded-0 text-bold" for="card4" style="height:300px; width: 300px" >

                      <!-- icon -->
                      <div class="col-12" >
                        <i class="material-icons md-large ">edit</i>
                      </div>

                      <!-- text -->
                      <div class="col-12">
                        <span style="font-size: 300%;">CUSTOM</span>
                      </div>
                  </label>

            </div>


            <!-- card5 -->
            <div class="col-auto">

                  <!-- input with the label -->
                  <input class="btn-check " type="radio" name="reason" value="sports" id="card5">
                  <label class="btn btn-outline-info btn-outline-light border rounded-0 text-bold" for="card5" style="height:300px; width: 300px">

                        <!-- icon -->
                        <div class="col-12">
                          <i class="material-icons md-large ">sports_basketball</i>
                        </div>

                        <!-- text -->
                        <div class="col-12">
                          <span style="font-size: 300%;">SPORTS</span>
                        </div>

                  </label>

            </div>

            <!-- card6 -->
            <div class="col-auto">

                  <!-- input with the label -->
                  <input class="btn-check " type="radio" name="reason" value="sick" id="card6">
                  <label class="btn btn-outline-info btn-outline-light text-nowrap border rounded-0 text-bold" for="card6" style="height:300px; width: 300px" >
                    <div class="row-4">

                      <!-- icon -->
                      <div class="col-12 " >
                        <i class="material-icons md-large ">sick</i>
                      </div>

                      <!-- text -->
                      <div class="col-12 ">
                        <span style="font-size: 300%;">SICK</span>
                      </div>
                    </div>
                  </label>

            </div>


      </div>
    </form>
  <?php }} ?>
  </body>
</html>
