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
                echo "<p>Time out: " . $student_aa['time_out'] . "</p>";
                if ($student_aa['time_in']!="") {
                    echo "<p>Time in: " . $student_aa['time_in'] . "</p>";
                    } else {
                        echo "<p>Time in: Student did not return</p>";
                    }
                    ?> <br> <?php
            } while ($student_aa = mysqli_fetch_assoc($student_qry));


            ?> 

            <br>
            <br>
            <br>

            <p>Previously signed out daily students</p>

            <?php


            $group_students_sql = "SELECT student_details.first_name, student_details.last_name, student_transactions.reason, student_transactions.time_out, student_transactions.group_ID,
                                            GROUP_CONCAT(DISTINCT student_transactions.time_in
                                                        ORDER BY student_transactions.group_ID DESC SEPARATOR ' ') AS time_in
                                        FROM student_transactions
                                        JOIN student_details ON student_transactions.student_ID=student_details.student_ID
                                        GROUP BY student_transactions.group_ID";
            $group_students_qry = mysqli_query($dbconnect, $group_students_sql);
            $group_students_aa = mysqli_fetch_assoc($group_students_qry);




            
                do {
                    echo "<p>First Name: " . $group_students_aa['first_name'] . "</p>";
                    echo "<p>Last Name: " . $group_students_aa['last_name'] . "</p>";
                    echo "<p>Reason: " . $group_students_aa['reason'] . "</p>";
                    echo "<p>Time out: " . $group_students_aa['time_out'] . "</p>";
                    if ($group_students_aa['time_in']!="") {
                    echo "<p>Time in: " . $group_students_aa['time_in'] . "</p>";
                    } else {
                        echo "<p>Time in: Student did not return</p>";
                    }
                    ?> <br> <?php
                } while ($group_students_aa = mysqli_fetch_assoc($group_students_qry));

                ?> <br> <?php



                    $group_ID_sql = "SELECT group_ID FROM student_transactions ORDER BY group_ID  DESC LIMIT 1";
                    $group_ID_qry = mysqli_query($dbconnect, $group_ID_sql);
                    $group_ID_aa = mysqli_fetch_assoc($group_ID_qry);  

                    $group_ID = $group_ID_aa['group_ID'];
                    $group_ID = $group_ID + 1;
                
            ?>
    </body>
</html>




