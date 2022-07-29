<?php
session_start();

include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Student sign out system</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="custom.css">
        
        
        <script type="text/javascript">
            function selectStudent(student_ID) {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("log").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET","studentDetails.php?student_ID="+student_ID,true);
            xmlhttp.send();
            }

            function selectReason() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("logout").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET","logout.php?reason="+reason,true);
            xmlhttp.send();
            }
            
            
        </script>
    </head>
    <body>

        <input type="text" name="student_ID" value="" onkeyup="selectStudent(this.value)">

        <div id="log">
            <h1>Welcome</h1>
        </div>

        <div id="logout">

        </div>
    </body>
</html>