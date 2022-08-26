<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

    <?php 

        // Including navbar page
        include("navbar.php");

        // CHeck if admin is set in session
        if(!isset($_SESSION['admin'])) {
            // Not logged in, redirect back to index page
            header("Location: index.php?page=login");
        } else {

        // Select all from student log table
        $student_sql = "SELECT * FROM student_log";
        $student_qry = mysqli_query($dbconnect, $student_sql);
        $student_aa = mysqli_fetch_assoc($student_qry);

        // If no student is found on search
        if (mysqli_num_rows($student_qry) == 0 ) {
            echo "ERROR no records in database";
        } else {
    ?>

    <!-- Responsive search -->
    <script>
        function searchstudent(name, studentID) {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("selectedstudents").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","studentrecords.php?studentID="+studentID,true);
        xmlhttp.send();

        $("#search-box").val(name);
        $("#suggesstion-box").hide();
        }
        
    </script>

    <!-- container -->
    <div class="contaner-fluid" id="selectedstudents">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>

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
                            // Create new table row for every result in query
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
    
    <?php }
    } ?>
    
</body>
</html>

