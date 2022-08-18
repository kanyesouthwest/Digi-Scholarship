<!DOCTYPE html>
<html> 
    <head>
        <link rel="stylesheet" href="stylesheet.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            session_start();

            if(!isset($_SESSION['admin'])) {
                // Not logged in, redirect back to index page
                header("Location: index.php?page=login");
            }

            include("dbconnect.php");
            // Select all information dependiong on ID
            $student_sql = "SELECT * FROM student_log";
            $student_qry = mysqli_query($dbconnect, $student_sql);
            $student_aa = mysqli_fetch_assoc($student_qry);  
            ?> 

        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Todays log</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>Search student by first name:</p>  
                        <input class="form-control" id="student_name" type="text" placeholder="Search..">
                        <table id=student_log_table class="table table-bordered table-responsive table-hover " style='border-color:black'>
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Time out</th>
                                    <th scope="col">Time in</th>
                                </tr>
                            </thead>
                            <tbody id ="log_table">
                                <?php
                                    do {
                                        echo "<tr>";
                                            echo "<th scope='row'> ". $student_aa['ID'] . "</th>";
                                            echo "<td>First Name: " . $student_aa['first_name'] . "</td>";
                                            echo "<td>Last Name: " . $student_aa['last_name'] . "</td>";
                                            echo "<td>Reason: " . $student_aa['reason'] . "</td>";
                                            echo "<td>Time out: " . $student_aa['time_out'] . "</td>";  
                                            echo "<td>Time in: " . $student_aa['time_in'] . "</td>";
                                        echo "</tr>";
                                        ?> <br> <?php
                                    } while ($student_aa = mysqli_fetch_assoc($student_qry));
                                    ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        Historical Log</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>test</p>
                    </div>
                </div>
            </div>
        </div>


            <script>
                $(document).ready(function(){
                $("#student_name").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#log_table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
                });
            </script>

            <br>
            <br>
            <br>

            <a href="export_daily.php">Export list of records to CSV</a>
            <br>
            <a href="export_old.php">Export list of historical records to CSV </a>
            <br>
            <a href="index.php?page=import">Import students</a>
            <br>
            <a href="index.php?page=logout">Click here to logout</a>
            <form action="index.php?page=uploadingcsv" method="post" enctype="multipart/form-data">

                <label for="formFile" class="form-label">Select CSV</label>
                <input type="file" class="form-control" name="csvfile" id="csvfile">

                <div class="mb-3">
                    
                </div>
                <input type="submit">
            </form>


            <p>Previously signed out daily students</p>
            <?php

            $group_students_sql = "SELECT group_ID AS gID, student_ID, first_name, last_name, reason, time_out, 
                                (SELECT time_in FROM student_transactions WHERE group_ID=gID AND time_in != '') 
                                AS time_in FROM `student_transactions` GROUP BY group_ID";
            $group_students_qry = mysqli_query($dbconnect, $group_students_sql);
            $group_students_aa = mysqli_fetch_assoc($group_students_qry);

            ?> 
            <br> 
            <?php
                $group_ID_sql = "SELECT group_ID FROM student_transactions ORDER BY group_ID  DESC LIMIT 1";
                $group_ID_qry = mysqli_query($dbconnect, $group_ID_sql);
                $group_ID_aa = mysqli_fetch_assoc($group_ID_qry);  

                $group_ID = $group_ID_aa['group_ID'];
                $group_ID = $group_ID + 1;
            ?>

    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Historical Logs
                </div>
                <div class="panel-body">
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Student ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $list = [];

                            do { 
                                $student_ID = $group_students_aa['student_ID']; 
                                    if (!in_array($student_ID, $list)) {
                                echo "<tr data-toggle='collapse' data-target='#demo$group_students_aa[student_ID]' class='accordion-toggle'>";
                                ?>
                                    <!-- pog -->
                                    <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                    <?php 
                                    
                                        echo "<td> $group_students_aa[student_ID] </td>";
                                        echo "<td> $group_students_aa[first_name] </td>";
                                        echo "<td> $group_students_aa[last_name] </td>";
                                        array_push($list, $group_students_aa['student_ID']);
                                    
                                    ?>
                                </tr>
                                
                                <td colspan="12" class="hiddenRow">
                                    <?php
                                    echo "<div class='accordian-body collapse' id='demo$group_students_aa[student_ID]'>"; 
                                    ?>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="info">
                                                    <th>Reason</th>
                                                    <th>Time out</th>
                                                    <th>Time in</th>	
                                                </tr>
                                            </thead>	
                                            <tbody>
                                                    <?php
                                                    $group1_students_sql = "SELECT group_ID AS gID, student_ID, first_name, last_name, reason, time_out, 
                                                            (SELECT time_in FROM student_transactions WHERE group_ID=gID AND time_in != '') 
                                                            AS time_in FROM `student_transactions` WHERE student_ID = '$group_students_aa[student_ID]' GROUP BY group_ID ";
                                                            
                                                        $group1_students_qry = mysqli_query($dbconnect, $group1_students_sql);
                                                        $group1_students_aa = mysqli_fetch_assoc($group1_students_qry);
                                                    do {
                                                        ?>
                                                        <tr data-toggle="collapse" class="accordion-toggle" data-target="#demo">
                                                        <?php
                                                        
                                                        echo "<td> $group1_students_aa[reason] </td>";
                                                        echo "<td> $group1_students_aa[time_out] </td>";
                                                        echo "<td> $group1_students_aa[time_in] </td>";
                                                        ?>
                                                        </tr>
                                                        <?php
                                                    } while ($group1_students_aa = mysqli_fetch_assoc($group1_students_qry));
                                                    
                                                    
                                                    ?>
                                        
                                    </div>
                                        </table>
                                        </td>
                                        <?php
                                    }?>
                                <?php } while ($group_students_aa = mysqli_fetch_assoc($group_students_qry)); ?>
                                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>




