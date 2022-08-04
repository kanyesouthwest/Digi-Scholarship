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
        
    <!-- navbar -->
    <nav class="navbar navbar-light sticky-top  border-bottom border-3" style="background-color: rgb(0, 49, 85);" >
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=newAdmin">
                <img src="photo/StACLogoWhite.png" alt="StACLogo" style="height: 40px; width: 60px;">
            </a>
            <div class="col d-lg-block d-none d-flex align-items-cente justify-content-center">
                <a class="btn btn-primary roundedconners" href="export_daily.php" role="button">Export</a>
            </div>
            <!-- search bar -->
            <div class="col d-flex align-items-cente justify-content-center ">

                <!-- Search students form  -->
                <form autocomplete="off" action="index.php?page=search" method="post">
                    <input name="search" type="text" placeholder="Student Search">
                </form>
            <!-- close search bar -->    
            </div>
            <div class="col d-flex align-items-cente justify-content-end ">
                <a class="btn btn-primary roundedconners" href="login.php" role="button">Log out</a>
            </div>
        </div>
    <!-- close navbar -->
    </nav>
    
    <?php
        $search = $_POST['search'];

        $result_sql = "SELECT group_ID AS gID, student_ID, first_name, last_name, reason, time_out, 
        (SELECT time_in FROM student_transactions WHERE group_ID=gID AND time_in != '') 
        AS time_in FROM `student_transactions` WHERE first_name LIKE '%$search%' GROUP BY group_ID ";
        $result_qry = mysqli_query($dbconnect, $result_sql);
        $result_aa = mysqli_fetch_assoc($result_qry);


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
    </body>
</html>