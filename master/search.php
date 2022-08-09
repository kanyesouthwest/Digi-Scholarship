<!DOCTYPE html>
<html>
    <head>
        <style>
        table, th, td {
            border: 1px solid black;
        }
        </style>
    </head>
    <body>
        
    <?php
        // Include navbar page
        include("navbar.php");

        // If session is empty then redirect
        if(empty($_SESSION['student_ID'])) {
            header("Location:index.php?page=newadmin");
        } else {

        // Grab ID and assign it to variable
        $student_ID = $_SESSION["student_ID"];

        // Query for student 
        $result_sql = "SELECT group_ID AS gID, student_ID, first_name, last_name, reason, time_out, 
        (SELECT time_in FROM student_transactions WHERE group_ID=gID AND time_in != '') 
        AS time_in FROM `student_transactions`  WHERE student_ID = $student_ID GROUP BY group_ID";
        $result_qry = mysqli_query($dbconnect, $result_sql);
        $result_aa = mysqli_fetch_assoc($result_qry);

        // Unset session when query complete
        unset($_SESSION['student_ID']);

        // If no student is found on search
        if (mysqli_num_rows($result_qry) == 0 ) {
            echo "$search was not found please try again";
        } else {
    ?>

    <!-- Table for students -->
    <div class="table-responsive">
        <table class="table table-light table-sm">
            <thead>
                <tr>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Time out</th>
                    <th scope="col">Time in</th>
                </tr>
            </thead>

            <?php
                // Loop for every record found in query 
                do {
            ?>
            <tr>
                <td><?php echo $result_aa["first_name"]; ?></td>
                <td><?php echo $result_aa["last_name"]; ?></td>
                <td><?php echo $result_aa["reason"]; ?></td>
                <td><?php echo $result_aa["time_out"]; ?></td>
                <td><?php echo $result_aa["time_in"]; ?></td>
            </tr>

            <?php
                
            } while ($result_aa = mysqli_fetch_assoc($result_qry));
            }
            ?>

        </table>
    <?php } ?>
    </body>
</html>