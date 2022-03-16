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

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="display-2">You have signed out</p>
                    <a href="index.php">Click here to go back</a>
                </div>
            </div>
        </div>

        <?php
            } else {
                // Update student record with time in
                $sign_in_sql = "UPDATE student_log SET time_in = (NOW()), in_school = 1 WHERE student_ID = $student_ID ORDER BY time_out DESC LIMIT 1";
                $sign_in_qry = mysqli_query($dbconnect, $sign_in_sql);


                $get_group_sql = "SELECT group_ID FROM student_transactions WHERE student_ID = $student_ID ORDER BY group_ID DESC LIMIT 1";
                $get_group_qry = mysqli_query($dbconnect, $get_group_sql);
                $get_group_aa = mysqli_fetch_assoc($get_group_qry);  


                $non_unique_group_ID = $get_group_aa['group_ID'];


                $sign_in_transaction_sql = "INSERT INTO student_transactions (group_ID, student_ID, time_in) VALUES ('$non_unique_group_ID','$student_ID', (NOW()))";
                $sign_in_transaction_qry = mysqli_query($dbconnect, $sign_in_transaction_sql);

                echo "You have signed in";
                ?> <a href="index.php">Click here to go back</a> <?php
            }





            // $test_sql = "DELETE FROM student_log WHERE date < (CURDATE() - INTERVAL 1 DAY)";            
        ?>
    </body>
</html>