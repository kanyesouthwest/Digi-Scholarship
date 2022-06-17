<?php 

// Load the database configuration file 
include ("dbconnect.php");

// Fetch records from database 
$export_query = $dbconnect->query("SELECT group_ID AS gID, student_ID, first_name, last_name, reason, time_out, 
                                    (SELECT time_in FROM student_transactions WHERE group_ID=gID AND time_in != '') 
                                    AS time_in FROM `student_transactions` GROUP BY group_ID"); 

if($export_query->num_rows > 0) { 
    $delimiter = ","; 
    $filename = "student-records_" . date('Y-m-d') . ".csv"; 

    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 

    // Set column headers 
    $fields = array('Student ID', 'First name', 'Last name', 'Reason', 'Time out', 'Time in'); 
    fputcsv($f, $fields, $delimiter); 

    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $export_query->fetch_assoc()){ 
        $lineData = array($row['student_ID'], $row['first_name'], $row['last_name'], $row['reason'], $row['time_out'], $row['time_in']); 
                            
        fputcsv($f, $lineData, $delimiter); 
    } 

    // Move back to beginning of file 
    fseek($f, 0); 

    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 

    //output all remaining data on a file pointer 
    fpassthru($f); 

    // If no students found in database
    } else {
        echo "No records in database";
        ?> <a href="index.php?page=admin">Go Back</a><?php
    }
exit; 

?>