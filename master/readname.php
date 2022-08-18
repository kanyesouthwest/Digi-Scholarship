<?php
    session_start();
    $dbconnect = mysqli_connect("localhost", "root", "", "sign_out_system_db");

    // Get keyword and escape any special characters
    $keyword = mysqli_real_escape_string($dbconnect, $_POST['keyword']);

    // If characters exist in variable
    if(!empty($keyword)) {

        // 
        $search_sql ="SELECT DISTINCT first_name, last_name, student_ID FROM student_transactions WHERE first_name LIKE '%$keyword%' OR last_name LIKE '%$keyword%' LIMIT 0,3";
        $search_qry = mysqli_query($dbconnect, $search_sql);

        // If name is returned
        if(!empty($search_qry)) { ?>
            <ul id="student-list">
                <?php
                    foreach($search_qry as $name) { ?>
                    <!-- On click display names in suggestion box & call function searchstudent-->
                    <li onClick="searchstudent('<?php echo $name["first_name"]; echo " "; echo $name["last_name"];  ?>', '<?php echo $name['student_ID']; ?>')"> 
                                                <?php echo $name["first_name"]; echo " "; echo $name["last_name"];  ?></li>
                    </li>
                <?php } ?>
            </ul>
        <?php 
        } 
    } 
?>