<?php
    include('dbconnect.php');

    if ($_GET['reason'] == "") {
        echo "<h1>Hello</h1>";
    } else {
        echo "You have signed out";
    }

    $reason = $_GET['reason'];
    echo $reason;




?>