<?php
$import_sql = "LOAD DATA INFILE 'C:/xampp/htdocs/Digi-Scholarship/master/student_data.csv'
                INTO TABLE student_details
                FIELDS TERMINATED BY ','
                ENCLOSED BY '\"'
                LINES TERMINATED BY '\\n'
                IGNORE 1 ROWS";
$import_qry = mysqli_query($dbconnect, $import_sql);
?>
<h1> Success </h1>
<a href="index.php?page=admin">Click here to go back</a>