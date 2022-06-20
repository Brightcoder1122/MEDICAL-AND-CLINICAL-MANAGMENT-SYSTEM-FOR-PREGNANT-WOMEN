<?php include_once('../includes/config.php'); ?>
<?php session_start() ?>
<?php

// REGISTER USER
if (isset($_POST['add_patient'])) {

    // receive all input values from the form
    $fname= mysqli_real_escape_string($dbconnect, $_POST['fname']);
    $mname= mysqli_real_escape_string($dbconnect, $_POST['mname']);
    $lname= mysqli_real_escape_string($dbconnect, $_POST['lname']);
    $sex = mysqli_real_escape_string($dbconnect, $_POST['sex']);
    $phone = mysqli_real_escape_string($dbconnect, $_POST['phone']);
    $address1 = mysqli_real_escape_string($dbconnect, $_POST['address1']);
    $address2 = mysqli_real_escape_string($dbconnect, $_POST['address2']);
   

    // form validation: ensure that the form is correctly filled ...

    $errors = array();
    //check if there is the any filed is empty
    if (empty($fname) || empty($lname) || empty($sex) || empty($sex) || 
        empty($phone) || empty($address1) || empty($address2) ) {
        
        //return error to user
        $_SESSION['error'] = "All field are required";
        header("location:patient_add.php");
        // echo "field required";
    }
    else {
        //patient password
        $password = '12345678';
        $password = md5($password);

        $send_data = mysqli_query($dbconnect, "INSERT INTO 
        `tbl_patient` (`patient_id`, `fname`, `mname`, `lname`, `sex`, `phone`,`address1`, `address2`, `password`)
        VALUES(NULL,'$fname', '$mname', '$lname', '$sex', '$phone', '$address1', '$address1', '$password')");
        
        if($send_data) {
            // return suucess messeg if user registured successfully
            $_SESSION['success'] = 'A new patient registered Successfully';
            header("location:patient.php");
        }
        else {
            $error = mysqli_error($dbconnect);
            $_SESSION['success'] = $error;
            header("location:patient_add.php");;
        }
    
    }
}