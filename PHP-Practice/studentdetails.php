<?php
    include('dbconnect.php');

    if ($_GET['student_ID'] == "") {
        echo "<h1>Welcome</h1>";
    } else {

    $student_ID = mysqli_real_escape_string($dbconnect, $_GET['student_ID']);


    // Select all information dependiong on ID
    $student_sql = "SELECT * FROM student_details WHERE student_ID = $student_ID";
    $student_qry = mysqli_query($dbconnect, $student_sql);
    $student_aa = mysqli_fetch_assoc($student_qry);  

    if(mysqli_num_rows($student_qry)==0) {
        echo "<h1>No student found</h1>";
    } else {

    $student_name = $student_aa['first_name']. " ".$student_aa['last_name'];
    
    echo "<h1>$student_name</h1>";
    ?>

    <form id="reason">
        <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="option" id="1" value="Lunch" checked>
            <label class="form-check-label" for="lunchleave">
                Lunch Leave
            </label>
        </div>
        <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="option" id="2" value="Doctor">
            <label class="form-check-label" for="doctor">
                Doctor
            </label>
        </div>
        <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="option" id="3" value="Appointment">
            <label class="form-check-label" for="appointment">
                Appointment
            </label>
        </div>
        <button onclick="selectReason()">Submit</button>
    </form>
    <?php
    }
    ?>








<?php
}?>