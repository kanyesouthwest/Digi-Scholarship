<?php
    // includes the database connection
    include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Sign out</title>
        <!-- CSS goes up here for bootrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" href="images/favicon.png">
    </head>
    <body>

        <form action="">
            <div class="form-group">
                <label for="student_ID">Student ID</label>
                <input name="student_ID" type="number" class="form-control" placeholder="Enter student ID">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <p>Enter student ID</p>

        <form>
            Student ID: <input type="text" onkeypress="showHint(this.value)">
            <button type="submit" class="btn btn-primary"><input onclick="showHint(this.value)">Submit</button>
        </form>

        <script>
            function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                document.getElementById("txtHint").innerHTML = this.responseText;
                }
            xmlhttp.open("GET", "gethint.php?q=" + str);
            xmlhttp.send();
                }
            }
        </script>


        <!-- javascript down here -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>