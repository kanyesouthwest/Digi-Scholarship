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

    <div class=" container-fluid">
      <form class="" action="index.php?page=complete" method="post">
        <div class="row d-flex align-items-center justify-content-center" style="height: 1080px; width: 1680px;">
          <div class="col-9">
            <div class="row align-items-center" style="height: 1080px;">
              <div class="col d-flex gap-5 d-flex align-items-center justify-content-center">

                <input class="btn-check form-check" type="radio" name="reason" value="custom" id="card1">
                <label class="btn btn-outline-info btn-outline-light d-flex align-items-center justify-content-center text-nowrap border border-5 rounded-0 text-bold" for="card1" style="height: 400px; width: 400px;" >
                  <div class="row row-cols-2">
                    <div class="col-12 " >
                      <i class="material-icons md-large ">edit</i>
                    </div>
                    <div class="col-12 ">
                      <span style="font-size: 300%;">CUSTOM</span>
                    </div>
                  </div>
                </label>

                <input class="btn-check " type="radio" name="reason" value="sports" id="card2">
                <label class="btn btn-outline-info btn-outline-light d-flex align-items-center justify-content-center text-nowrap border border-5 rounded-0 text-bold" for="card2" style="height: 400px; width: 400px;" >
                  <div class="row row-cols-2">
                      <div class="col-12 " >
                        <i class="material-icons md-large ">sports_basketball</i>
                      </div>
                      <div class="col-12 ">
                        <span style="font-size: 300%;">SPORTS</span>
                      </div>
                  </div>
                </label>

                <input class="btn-check " type="radio" name="reason" value="sick" id="card3">
                <label class="btn btn-outline-info btn-outline-light d-flex align-items-center justify-content-center text-nowrap border border-5 rounded-0 text-bold" for="card3" style="height: 400px; width: 400px;" >
                  <div class="row row-cols-2">
                    <div class="col-12 " >
                      <i class="material-icons md-large ">sick</i>
                    </div>
                    <div class="col-12 ">
                      <span style="font-size: 300%;">SICK</span>
                    </div>
                  </div>
                </label>
              </div>

              <div class="col d-flex gap-5 d-flex align-items-center justify-content-center">
                <input class="btn-check " type="radio" name="reason" value="dolores" id="card4">
                <label class="btn btn-outline-info btn-outline-light d-flex align-items-center justify-content-center text-nowrap border border-5 rounded-0 text-bold" for="card4" style="height: 400px; width: 400px;" >
                  <div class="row row-cols-2">
                    <div class="col-12 " >
                      <i class="material-icons md-large ">medication</i>
                    </div>
                    <div class="col-12 ">
                      <span style="font-size: 300%;">DOCTORS</span>
                    </div>
                  </div>
                </label>

                <input class="btn-check " type="radio" name="reason" value="school" id="card5">
                <label class="btn btn-outline-info btn-outline-light d-flex align-items-center justify-content-center text-nowrap border border-5 rounded-0 text-bold" for="card5" style="height: 400px; width: 400px;" >
                  <div class="row row-cols-2">
                    <div class="col-12 " >
                      <i class="material-icons md-large ">directions_bus_filled</i>
                    </div>
                    <div class="col-12 ">
                      <span style="font-size: 300%;">SCHOOL TRIP</span>
                    </div>
                  </div>
                </label>

                <input class="btn-check" type="radio" name="reason" value="lunch" id="card6" checked>
                <label class="btn btn-outline-info btn-outline-light d-flex align-items-center justify-content-center text-nowrap border border-5 rounded-0 text-bold" for="card6" style="height: 400px; width: 400px;" >
                  <div class="row row-cols-2">
                    <div class="col-12 " >
                      <i class="material-icons md-large ">restaurant</i>
                    </div>
                    <div class="col-12 ">
                      <span style="font-size: 300%;">LUNCH</span>
                    </div>
                  </div>
                </label>
              </div>
            </div>
          </div>

          <div class="col-3 border border-5 rounded-0 d-flex align-items-cente justify-content-center container-fluid" style="height: 940px; width: 400px;">
            <div class="row d-flex align-items-center justify-content-center container-fluid">
              <div class="row-5 " >
                <div class="col-12 text-white text-center ">
                  <p class="text-white text-bold" style="font-size: 300%;"> <?php echo $student_aa['first_name']; ?> </p>
                  <p class="text-white text-bold" style="font-size: 300%;"> <?php echo $student_aa['last_name']; ?> </p>

                  <!-- <p class="text-white text-bold" style="font-size: 300%;">MACGREGOR</p>
                  <p class="text-white text-bold" style="font-size: 300%;">MATTHEWS</p> -->
                </div>
              </div>

              <div class="row-2 d-flex align-items-cente justify-content-center">
                <a class="btn btn-danger rounded-0 text-bold border border-light border-5 " href="index.php?page=home" role="button">
                  <div class="row">
                    <div class="col-4">
                      <p class="text-white text-bold" style="font-size: 300%;">BACK</p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="row-5">
                <div class="col-12 d-flex align-items-cente justify-content-center">
                  <!-- <input type="checkbox" class="form-check-input" name="studentID" value= php {$studentID} ?>"id="studentID">
                  <label type="form-check-label" for="studentID"> ?php echo "$student_ID";?> -->

                  <button class="btn btn-success d-flex align-items-center justify-content-center text-nowrap  rounded-0 text-bold border border-light border-5 padding-0 gx-0" type="submit" class="btn" id="submit" >
                    <div class="row row-cols-2">
                      <div class="col-12 " >
                        <i class="material-icons md-large ">done</i>
                      </div>
                      <div class="col-12 ">
                        <span style="font-size: 300%;">SUBMIT</span>
                      </div>
                    </div>
                  </button>
                </div>
              </div>
            </div>
          </div>
      </form>
    </div>
    <?php }
    } ?>
  </body>
</html>
