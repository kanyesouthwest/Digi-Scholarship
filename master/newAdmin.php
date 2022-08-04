<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

    <!-- <style>
        /* CSS CAN BE REMOVED/EDITED */
        body{width:610px;}
        .frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
        #country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
        #country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
        #country-list li:hover{background:#ece3d2;cursor: pointer;}
        #search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}

    </style> -->
    <script src="Bootstrap/jquery-2.1.1.min.js" type="text/javascript"></script>

    <!-- Autocomplete script -->
    <script>
        $(document).ready(function(){
            $("#search-box").keyup(function(){
                $.ajax({
                type: "POST",
                // location of query
                url: "readname.php",
                data:'keyword='+$(this).val(),
                beforeSend: function(){
                    $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data){
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background","#FFF");
                }
                });
            });
        });

        function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
        }

    </script>



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
                    <div class="frmSearch">
                        <input name="search" type="text" id="search-box" placeholder="Student Search" />
                        <div id="suggesstion-box"></div>
                    </div>    
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