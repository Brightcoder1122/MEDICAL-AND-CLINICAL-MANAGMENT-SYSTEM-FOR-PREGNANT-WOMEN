<?php include_once('../includes/config.php'); ?>
<?php

// REGISTER USER
if (isset($_POST['reset'])) {
 
    // receive all input values from the form for clinic
    $appoint= mysqli_real_escape_string($dbconnect, $_POST['appoint']);
    $date= mysqli_real_escape_string($dbconnect, $_POST['date']);

    // validate input
    if(empty($appoint) || empty($date)) {
        $_SESSION['error'] = "All field are required";
        header("location:reset_clinic.php?reset_clinic=$appoint");
    }
    //reject the day less than today
    $today = date('Y-m-d');
    if($date < $today) {
        $_SESSION['error'] = "Date must be greter than today";
        header("location:reset_clinic.php?reset_clinic=$appoint");
    }

    else {
        if(mysqli_query($dbconnect, "UPDATE tbl_appointment SET reporting_date = '$date' WHERE opp_id='$appoint' ")) {
            $_SESSION['success'] = "Appointment updated successfully";
            header("location:all_appointment.php"); 
        }
        else {
            $_SESSION['error'] = "Failed to update appointment";
            header("location:all_appointment.php");
        }
    }
}

else {
    echo "bad access method";
}