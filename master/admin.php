<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

    <?php 
        include("navbar.php");

        if(!isset($_SESSION['admin'])) {
            // Not logged in, redirect back to index page
            header("Location: index.php?page=login");
        }


        $student_sql = "SELECT * FROM student_log";
        $student_qry = mysqli_query($dbconnect, $student_sql);
        $student_aa = mysqli_fetch_assoc($student_qry);

        // If no student is found on search
        if (mysqli_num_rows($student_qry) == 0 ) {
            echo "ERROR no records in database";
        } else {
    ?>

<script type="text/javascript">
    function searchstudent(name, studentID) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("selectedstudents").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","studentrecords.php?studentID="+studentID,true);
    xmlhttp.send();
    }
    
</script>

    <!-- container -->
    <div class="contaner-fluid" id="selectedstudents">
        
        <!-- holds the col table -->
        <div class="row m-1">

            <!-- the table col -->
            <div class="table-responsive" >
            
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

                    <tbody>
                        <?php
                            do {
                        ?>
                        <tr>
                            <td><?php echo $student_aa["first_name"]; ?></td>
                            <td><?php echo $student_aa["last_name"]; ?></td>
                            <td><?php echo $student_aa["reason"]; ?></td>
                            <td><?php echo $student_aa["time_out"]; ?></td>
                            <td><?php echo $student_aa["time_in"]; ?></td>
                        </tr>

                        <?php
                        } while ($student_aa = mysqli_fetch_assoc($student_qry));
                        ?>
                        
                    </tbody>
                </table> 
            <!-- close table col div -->
            </div>

        <!-- close row to hold table -->
        </div>
    <!-- contaier close -->
    </div>
<?php } ?>
    
</body>
</html>

