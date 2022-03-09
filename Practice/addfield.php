<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Stac Students</title>
        <!-- CSS goes up here for bootrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" href="images/favicon.png">
    </head>
    <body>

        <?php    
            include("dbconnect.php");


            // Declare variable using ID from form
            $student_ID = mysqli_real_escape_string($dbconnect, $_POST['student_ID']);
            

            // Select all information dependiong on ID
            $student_sql = "SELECT * FROM student_details WHERE student_ID = $student_ID";
            $student_qry = mysqli_query($dbconnect, $student_sql);
            $student_aa = mysqli_fetch_assoc($student_qry);  

            // Confirm if sudent has/has not signed out
            $search_sql = "SELECT * FROM student_log WHERE student_ID = $student_ID";
            $search_qry = mysqli_query($dbconnect,$search_sql);
            $search_aa = mysqli_fetch_assoc($search_qry);  

            if (mysqli_num_rows($search_qry) != 0 ) {
                $student_status = $search_aa['in_school'];
            }

            // if (mysqli_num_rows($search_qry) == 0 ) {

            // Check if student has not signed out
            if ((mysqli_num_rows($search_qry) == 0 ) or ($student_status == 0)) {

                // Declare variables using form * student_details table
                $first_name = $student_aa['first_name'];
                $last_name = $student_aa['last_name'];
                $reason = mysqli_real_escape_string($dbconnect, $_POST['reason']);



                // Inserts data into log table
                $sign_out_sql = "INSERT INTO student_log (student_ID, first_name, last_name, reason, time_out') VALUES ('$student_ID','$first_name','$last_name','$reason', (NOW()) ";
                $sign_out_qry = mysqli_query($dbconnect, $sign_out_sql);
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="display-2">You have signed out</p>
                </div>
            </div>
        </div>

        <?php
            } else {
                $sign_in_sql = "UPDATE student_log SET time_in = (NOW()) WHERE student_ID = $student_ID";
                $sign_in_qry = mysqli_query($dbconnect, $sign_in_sql);

                echo "You have signed in";


            }
        ?>
    </body>
</html>


<!-- USE SELECT * FROM student_log WHERE `time_in`= '' FOR CHECKING EMPTY FIELDS -->