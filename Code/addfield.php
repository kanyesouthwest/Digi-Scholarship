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


            $search_sql = "SELECT * FROM student_details WHERE student_ID = $student_ID";
            $search_qry = mysqli_query($dbconnect, $search_sql);
            $search_aa = mysqli_fetch_assoc($search_qry);  



            // Assigns information from form and details table
            $student_ID = mysqli_real_escape_string($dbconnect, $_POST['student_ID']);
            $first_name = $search_aa['first_name'];
            $last_name = $search_aa['last_name'];
            $reason = mysqli_real_escape_string($dbconnect, $_POST['reason']);
            $time_out = mysqli_real_escape_string($dbconnect, $_POST['time_out']);


            // Inserts data into log table
            $insert_sql = 
                        "INSERT INTO student_log (student_ID, first_name, last_name, reason, time_out) 
                        VALUES ('$student_ID','$first_name','$last_name','$reason','$time_out')";
            $insert_qry = mysqli_query($dbconnect, $insert_sql);
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="display-2">You have signed out</p>
                </div>
            </div>
        </div>
    </body>
</html>


<!-- USE SELECT * FROM student_log WHERE `time_in`= '' FOR CHECKING EMPTY FIELDS -->