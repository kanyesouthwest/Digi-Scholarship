<!DOCTYPE html>
<head>
    <title>Late</title>
</head>
<body>
    
    <?php
        $dbconnect = mysqli_connect("localhost", "root", "", "sign_out_system_db");

        do {

            // Get rows where time_in is null
            $late_sql = "SELECT * FROM student_log WHERE time_in IS NULL";
            $late_qry = mysqli_query($dbconnect, $late_sql);
            $late_aa = mysqli_fetch_assoc($late_qry);

            if (mysqli_num_rows($late_qry) != 0 ) {

                // Get student ID from late array
                $student_ID = $late_aa['student_ID'];

                // Update student log if student didnt return
                $update_log_sql = "UPDATE student_log SET time_in = 'Did not return', in_school = 1 WHERE student_ID = $student_ID ORDER BY time_out DESC LIMIT 1";
                $update_log_qry = mysqli_query($dbconnect, $update_log_sql);

                $get_group_sql = "SELECT group_ID FROM student_transactions WHERE student_ID = $student_ID ORDER BY group_ID DESC LIMIT 1";
                $get_group_qry = mysqli_query($dbconnect, $get_group_sql);
                $get_group_aa = mysqli_fetch_assoc($get_group_qry);
        
                $non_unique_group_ID = $get_group_aa['group_ID'];



                // Add student transaction if student didnt return
                $update_historical_sql = "INSERT INTO student_transactions (group_ID, student_ID, time_in) VALUES ('$non_unique_group_ID','$student_ID', 'Did not return')";
                $update_historical_qry = mysqli_query($dbconnect, $update_historical_sql);
            } else {
                echo "No late bozos";
            }
        } while ($late_aa = mysqli_fetch_assoc($late_qry));
    ?>

</body>
</html>