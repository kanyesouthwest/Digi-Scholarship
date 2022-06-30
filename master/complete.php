<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sucess</title>
  </head>
  <body style="background-color: rgb(0,65,122);">
    <?php
    session_start();

      if(!isset($_POST['reason'])) {
          header("Location: home.php");

      } else {
        $student_ID = $_SESSION["student_ID"];

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

        // If student has signed out before
        if (mysqli_num_rows($search_qry) != 0 ) {

            // Varible if they are in school or not
            // 1 = IN
            // 2 = OUT
            $student_status = $order_aa['in_school'];

            // Declare variables using form & student_details table
            $first_name = $student_aa['first_name'];
            $last_name = $student_aa['last_name'];
            $reason = mysqli_real_escape_string($dbconnect, $_POST['reason']);
        }


        // Check if student has never signed out or signing out again
        if ((mysqli_num_rows($search_qry) == 0) or ($student_status == 1)) {


            $first_name = $student_aa['first_name'];
            $last_name = $student_aa['last_name'];
            $reason = mysqli_real_escape_string($dbconnect, $_POST['reason']);


            // Inserts data into log table
            $sign_out_sql = "INSERT INTO student_log (student_ID, first_name, last_name, reason, time_out, in_school) VALUES ('$student_ID','$first_name','$last_name','$reason', (NOW()), 2)";
            $sign_out_qry = mysqli_query($dbconnect, $sign_out_sql);


            $group_ID_sql = "SELECT group_ID FROM student_transactions ORDER BY group_ID  DESC limit 1";
            $group_ID_qry = mysqli_query($dbconnect, $group_ID_sql);
            $group_ID_aa = mysqli_fetch_assoc($group_ID_qry);

            $group_ID_unique = $group_ID_aa['group_ID'];
            $group_ID_unique = $group_ID_unique + 1;


            // Inserts data into transactions table
            $sign_out_transaction_sql = "INSERT INTO student_transactions (group_ID, student_ID, first_name, last_name, reason, time_out) VALUES ('$group_ID_unique','$student_ID','$first_name','$last_name','$reason', (NOW()))";
            $sign_out_transaction_qry = mysqli_query($dbconnect, $sign_out_transaction_sql);
            
            ?>


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
                  <p class="text-light display-1">You have signed out</p>
                  <p>you will be redirected in 2 seconds</p>
                </div>

              <!-- row to hold logo and text box closee-->
              </div>

              <form action="index.php?page=reason" method="post">
                <div class="form-group">
                  <label for="student_ID"></label>
                  <input name="student_ID" type="number" autofocus="on" autocomplete="off" class="form-control border border-0 bg-success " onblur="this.focus()" style=" color: rgba(0,0,0,0); --bs-bg-opacity: .0;">
                </div>
              </form>
              
            <!-- contaner close-->
            </div>

            <?php
            header('Refresh:3 ; URL=index.php?page=home');
            }
        }
    ?>



  </body>
</html>
