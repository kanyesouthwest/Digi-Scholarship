<?php 
    session_start();

    $username = mysqli_real_escape_string($dbconnect, $_POST['username']);
    $password = mysqli_real_escape_string($dbconnect, $_POST['password']);


    $user_sql = "SELECT * FROM user WHERE username='$username'";
    $user_qry = mysqli_query($dbconnect, $user_sql);
    

    if(mysqli_num_rows($user_qry)==0) {
        header("Location:index.php?page=login&error=fail");
    } else {
        $user_aa = mysqli_fetch_assoc($user_qry);


    $hash_password = $user_aa['password'];
    if (password_verify($password, $hash_password)) {
        $_SESSION['admin'] = $username;
        header("Location: index.php?page=admin");
    } else {
        header("Location:index.php?page=login&error=fail");
    }
}
?>