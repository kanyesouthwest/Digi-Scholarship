<!DOCTYPE html>
<head>
    <title>Insert csv data</title>
</head>
<body>
    

    
    <?php
        
        $dbconnect = mysqli_connect("localhost", "root", "", "sign_out_system_db");

        // Get all data from student records
        $empty_sql = "SELECT * FROM student_details";
        $empty_qry = mysqli_query($dbconnect, $empty_sql);

        // If table is not already empty then empty it
        if (mysqli_num_rows($empty_qry) != 0 ) {

            $truncate_details_sql = "TRUNCATE student_details";
            $truncate_details_qry = mysqli_query($dbconnect, $truncate_details_sql);
            echo "Logs Emptied";
        }

        // Import CSV data
        $import_sql = "LOAD DATA INFILE 'C:/xampp/htdocs/Digi-Scholarship/master/data/student_details.csv'
                INTO TABLE student_details
                FIELDS TERMINATED BY ','
                ENCLOSED BY '\"'
                LINES TERMINATED BY '\\n'
                IGNORE 1 ROWS";
        $import_qry = mysqli_query($dbconnect, $import_sql);

        echo "Added records";
?>

</body>
</html>