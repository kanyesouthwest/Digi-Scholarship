<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

    <?php 
        include("navbar.php");

        $student_sql = "SELECT * FROM student_log";
        $student_qry = mysqli_query($dbconnect, $student_sql);
        $student_aa = mysqli_fetch_assoc($student_qry);
    ?>



    <!-- container -->
    <div class="contaner-fluid">
        
        <!-- holds the col table -->
        <div class="row m-1">

            <!-- the table col -->
            <div class="table-responsive">
            
                <table class="table table-light table-sm table-hover">
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
</body>
</html>