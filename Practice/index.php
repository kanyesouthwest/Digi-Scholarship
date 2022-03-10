<?php
    session_start();
    // includes the database connection
    include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Stac Students</title>
        <!-- CSS goes up here for bootrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" href="images/favicon.png">
    </head>
    <body>
        <?php

            // checks if the page get array is set to see if it displays students or the weclome
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                include("$page.php");
            }

        ?>

        <form action="addfield.php" method="post">
            <div class="form-group">
                <label for="student_ID">Student ID</label>
                <input name="student_ID" type="number" class="form-control" placeholder="Enter student ID">
            </div>
            <div class="form-group">
                <label for="reason">Reason</label>
                <input name="reason" type="text" class="form-control" placeholder="Enter reason">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


        <!-- javascript down here -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>