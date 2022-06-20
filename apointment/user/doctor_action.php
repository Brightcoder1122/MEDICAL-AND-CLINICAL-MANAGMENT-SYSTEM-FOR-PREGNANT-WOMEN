<?php include_once('../includes/config.php'); ?>
<?php session_start() ?>
<?php

// REGISTER USER
if (isset($_POST['add_user'])) {

    // receive all input values from the form
    $fname= mysqli_real_escape_string($dbconnect, $_POST['fname']);
    $mname= mysqli_real_escape_string($dbconnect, $_POST['mname']);
    $lname= mysqli_real_escape_string($dbconnect, $_POST['lname']);
    $sex = mysqli_real_escape_string($dbconnect, $_POST['sex']);
    $email = mysqli_real_escape_string($dbconnect, $_POST['email']);
    $phone = mysqli_real_escape_string($dbconnect, $_POST['phone']);
    $type = mysqli_real_escape_string($dbconnect, $_POST['type']);
    $username = mysqli_real_escape_string($dbconnect, $_POST['username']);
    $password = mysqli_real_escape_string($dbconnect, $_POST['password']);
    $password_2 = mysqli_real_escape_string($dbconnect, $_POST['password2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array

    $errors = array();
    //check if there is the any filed is empty
    if (empty($fname) || empty($lname) || empty($sex) || empty($email) || empty($sex) || 
        empty($phone) || empty($username) || empty($password) || empty($password_2) || empty($type)) {
        
        //return error to user
        $_SESSION['error'] = "All field are required";
        header("location:doctor_add.php");
        // echo "field required";
    } else {
        // if two password does not metch provide an error to user
        if ($password != $password_2) {
            $_SESSION['error'] = 'Password must metch';
            header('location:doctor_add.php');
            // echo 'error password';
        } else {
            //encrypt password
            $password = md5($password);

            $send_data = mysqli_query($dbconnect, "INSERT INTO 
            `tbl_user` (`user_id`, `fname`, `mname`, `lname`, `sex`, `phone`, `email`, `active`, `type`, `username` ,`password`)
            VALUES(NULL,'$fname', '$mname', '$lname', '$sex', '$phone', '$email', 1, '$type', '$username', '$password')");
            
            if($send_data) {
                // return suucess messeg if user registured successfully
                $_SESSION['success'] = 'A new doctor registered Successfully';
                header("location:doctor.php");
            } else {
                $error = mysqli_error($dbconnect);
                $_SESSION['success'] = $error;
                header("location:doctor_add.php");;
            }
        }
    }
}

//reset user password
else if (isset($_GET['reset'])) {
    // receive user id values from the url
    $user_id = $_GET['reset'];
    $password = '123456';
    $password = md5($password);
    
    // delete user 
    if(mysqli_query($dbconnect, "UPDATE tbl_user SET password='$password' WHERE (((user_id) = '$user_id' ))")) {
        $_SESSION['success'] = "Doctor password reseted successfully";
        header("location:doctor.php");
    } else {
        $_SESSION['error'] = "Something wents wrong try again";
        header("location:doctor.php");
    }
 
}

//update user datail
else if (isset($_POST['edit_user'])) {

    // receive all input values from the form
    $fname= mysqli_real_escape_string($dbconnect, $_POST['fname']);
    $mname= mysqli_real_escape_string($dbconnect, $_POST['mname']);
    $lname= mysqli_real_escape_string($dbconnect, $_POST['lname']);
    $sex = mysqli_real_escape_string($dbconnect, $_POST['sex']);
    $email = mysqli_real_escape_string($dbconnect, $_POST['email']);
    $phone = mysqli_real_escape_string($dbconnect, $_POST['phone']);
    $type = mysqli_real_escape_string($dbconnect, $_POST['type']);
    $username = mysqli_real_escape_string($dbconnect, $_POST['username']);
    $user_id = mysqli_real_escape_string($dbconnect, $_POST['user_id']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array

    $errors = array();
    //check if there is the any filed is empty
    if (empty($fname) || empty($lname) || empty($sex) || empty($email) || empty($sex) || 
        empty($phone) || empty($username) || empty($type) || empty($user_id)) {
        
        //return error to user
        $_SESSION['error'] = "All field are required";
        header("location:doctor_add.php");
        // echo "field required";
    } else {
        $update_data = mysqli_query($dbconnect, "UPDATE tbl_user SET
        fname = '$fname', mname ='$mname', 
        lname = '$lname', sex = '$sex', 
        phone = '$phone', email = '$email', 
        type = '$type', 
        username = '$username'
        WHERE (((user_id) = '$user_id' ))");
        
        if($update_data) {
            // return suucess messeg if user registured successfully
            $_SESSION['success'] = 'A doctor Updated Successfully';
            header("location:doctor.php");
        } else {
            $error = mysqli_error($dbconnect);
            $_SESSION['success'] = $error;
            header("location:doctor_add.php");;
        }
        
    }
} else {
    $_SESSION['error'] = "Bad access method";
    header("location:index.php");
}

?>