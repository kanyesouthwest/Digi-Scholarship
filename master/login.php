<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
<?php 
    session_start();

    if(isset($_SESSION['admin'])) {
        // Already logged in, redirect to the admin panel
        header("Location: index.php?page=admin");
    }

?>

<!-- contaner -->
<div class="container-fluid  d-flex align-items-center justify-content-center vstack text-light">
      <!-- row to hold sing in form -->
      <div class="row g-5 d-flex align-items-center justify-content-center roundedconners border border-5">
        
        <form action="index.php?page=verify" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" placeholder="Enter username" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
            </div>
            <div class="col p-3 d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        
      <!-- row to hold sing in form-->
      </div>
    <!-- contaner close-->
    </div>



<?php 
    if(isset($_GET['error'])) { ?>
    <div class="alert alert-danger" role="alert"> 
        Username or password is incorrect
    </div>
    <?php } ?>

</body>
</html>