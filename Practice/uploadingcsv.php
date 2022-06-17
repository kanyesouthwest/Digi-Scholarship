<?php

        // If the file is uploaded
        if(is_uploaded_file($_FILES['csvfile']['tmp_name'])){

            $filename = $_FILES["csvfile"]["tmp_name"];
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['csvfile']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $ID   = $line[0];
                $first_name  = mysqli_real_escape_string($dbconnect, $line[1]);
                $last_name  = mysqli_real_escape_string($dbconnect, $line[2]);
                $year = $line[3];
                $student_ID = $line[4];

                
                // Check whether student already exists in the database with the same email
                $prevQuery = "SELECT ID FROM student_details WHERE ID = '".$line[1]."'";
                $prevResult = $dbconnect->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update student data in the database
                    $sql = "UPDATE test SET ID = '".$ID."', first_name = '".$first_name."', last_name = '".$last_name."', year = '".$year."', student_ID = '".$student_ID."' ";
                    
                } else {
                    // Insert student data in the database
                    $sql="INSERT INTO test (ID, first_name, last_name, `year`, student_ID) VALUES ('$ID', '$first_name', '$last_name', '$year', '$student_ID')";
                    
                    // $dbconnect->query ("INSERT INTO test (ID, first_name, last_name, `year`, student_ID) VALUES ( '$ID', '$first_name', '$last_name', '$year', '$student_ID' )");
                }
                echo $sql;
                $qry = mysqli_query($dbconnect, $sql);
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        } else{
            $qstring = '?status=err';
        }

// Redirect to the listing page
header("Location: index.php?page=csv".$qstring);
