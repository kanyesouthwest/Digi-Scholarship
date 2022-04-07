<?php 

// Load the database configuration file 
include ("dbconnect.php");

// Fetch records from database 
$export_query = $dbconnect->query("SELECT student_details.student_ID, student_details.first_name, student_details.last_name, student_transactions.reason, student_transactions.time_out, student_transactions.group_ID,
                                    GROUP_CONCAT(DISTINCT student_transctions.time_in
                                        ORDER BY student_transactions.group_ID DESC SEPARATOR ' ') AS time_in
                                    FROM student_transactions
                                    JOIN student_details ON student_transactions.student_ID=student_details.student_ID
                                        GROUP BY student_transactions.group_ID"); 

if($export_query->num_rows > 0) { 
    $delimiter = ","; 
    $filename = "student-records_" . date('Y-m-d') . ".csv"; 

    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 

    // Set column headers 
    $fields = array('ID', 'Student ID', 'First name', 'Last name', 'Reason', 'Time out', 'Time in'); 
    fputcsv($f, $fields, $delimiter); 

    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $export_query->fetch_assoc()){ 
        $lineData = array($row['ID'], $row['student_ID'], $row['first_name'], $row['last_name'], $row['reason'], $row['time_out'], $row['time_in']); 
        fputcsv($f, $lineData, $delimiter); 
    } 

    // Move back to beginning of file 
    fseek($f, 0); 

    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 

    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 

?>