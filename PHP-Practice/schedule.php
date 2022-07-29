<!DOCTYPE html>
<head>
    <title>TEST</title>
</head>
<body>
    
    <?php

        $test1 = "Hello";
        $test2 = "Testing";

        $dbconnect = mysqli_connect("localhost", "root", "", "sign_out_system_db");
        $test_sql = "TRUNCATE student_log";
        $test_qry = mysqli_query($dbconnect, $test_sql);

    ?>


</body>
</html>