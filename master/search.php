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
        
    <!-- Navbar -->
    <nav class="navbar navbar-light sticky-top  border-bottom border-3" style="background-color: rgb(0, 49, 85);" >
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=newAdmin">
                <img src="photo/StACLogoWhite.png" alt="StACLogo" style="height: 40px; width: 60px;">
            </a>
            <div class="col d-lg-block d-none d-flex align-items-cente justify-content-center">
                <a class="btn btn-primary roundedconners" href="export_daily.php" role="button">Export</a>
            </div>
            <div class="col d-flex align-items-cente justify-content-end ">
                <a class="btn btn-primary roundedconners" href="login.php" role="button">Log out</a>
            </div>
        </div>
    <!-- close navbar -->
    </nav>
    
    <?php
        $search = $_POST['search'];

        $result_sql = "SELECT * FROM student_log WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'";
        $result_qry = mysqli_query($dbconnect, $result_sql);
        $result_aa = mysqli_fetch_assoc($result_qry);
    ?>

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
            ?>

        </table>
    </body>
</html>