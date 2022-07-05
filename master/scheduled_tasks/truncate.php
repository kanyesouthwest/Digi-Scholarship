<!DOCTYPE html>
<head>
    <title>Truncate table</title>
</head>
<body>
    

    
    <?php
        
        $dbconnect = mysqli_connect("localhost", "root", "", "sign_out_system_db");



        // Clears student log table daily
        $truncate_log_sql = "TRUNCATE student_log";
        $truncate_log_qry = mysqli_query($dbconnect, $truncate_log_sql);



        // Clears student records table daily
        $truncate_details_sql = "TRUNCATE student_details";
        $truncate_details_qry = mysqli_query($dbconnect, $truncate_details_sql);
    ?>

</body>
</html>