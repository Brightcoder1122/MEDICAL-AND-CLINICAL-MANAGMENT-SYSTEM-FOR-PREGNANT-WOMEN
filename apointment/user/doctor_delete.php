<?php include_once('../includes/config.php'); ?>
<?php session_start() ?>
<?php

// REGISTER USER
if (isset($_GET['user_delete'])) {
    // receive user id values from the url
    $user_id = $_GET['user_delete'];
    
    // delete user 
    if(mysqli_query($dbconnect, "DELETE FROM tbl_user WHERE (((user_id) = '$user_id' ))")) {
        $_SESSION['success'] = "User deleted successfully";
        header("location:doctor.php");
    } else {
        $_SESSION['error'] = "Something wents wrong try again";
        header("location:doctor.php");
    }
 
}
else {
    $_SESSION['error'] = "Bad access method";
    header("location:index.php");
}

?>