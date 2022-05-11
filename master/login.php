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

<form action="index.php?page=verify" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input name="username" type="text" class="form-control" placeholder="Enter username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php 
    if(isset($_GET['error'])) { ?>
    <div class="alert alert-danger" role="alert"> 
        Username or password is incorrect
    </div>
    <?php } ?>

</body>
</html>