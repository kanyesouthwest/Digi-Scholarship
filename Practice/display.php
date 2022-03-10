<!DOCTYPE html>
<html> 
    <head>

    </head>
    <body>
        <a href="index.php">Click here to go back</a>


        <?php
            include("dbconnect.php");


            // Select all information dependiong on ID
            $student_sql = "SELECT * FROM student_log";
            $student_qry = mysqli_query($dbconnect, $student_sql);
            $student_aa = mysqli_fetch_assoc($student_qry);  

            do {

                echo "<p>Student ID: " . $student_aa['student_ID'] . "</p>";
                echo "<p>First Name: " . $student_aa['first_name'] . "</p>";
                echo "<p>Last Name: " . $student_aa['last_name'] . "</p>";
                echo "<p>Reason: " . $student_aa['reason'] . "</p>";
                echo "<p>Time in: " . $student_aa['time_in'] . "</p>";
                echo "<p>Time out: " . $student_aa['time_out'] . "</p>";


            } while ($student_aa = mysqli_fetch_assoc($student_qry));


            ?> 

            <br>
            <br>
            <br>

            <p>Previously signed out daily students</p>

            <?php

            $student_old_sql = "SELECT * FROM student_transactions";
            $student_old_qry = mysqli_query($dbconnect, $student_old_sql);
            $student_old_aa = mysqli_fetch_assoc($student_old_qry);  

            do {

                echo "<p>Student ID: " . $student_old_aa['student_ID'] . "</p>";
                echo "<p>First Name: " . $student_old_aa['first_name'] . "</p>";
                echo "<p>Last Name: " . $student_old_aa['last_name'] . "</p>";
                echo "<p>Reason: " . $student_old_aa['reason'] . "</p>";
                echo "<p>Time in: " . $student_old_aa['time_in'] . "</p>";
                echo "<p>Time out: " . $student_old_aa['time_out'] . "</p>";


            } while ($student_aa = mysqli_fetch_assoc($student_qry));


        ?>
    </body>
</html>