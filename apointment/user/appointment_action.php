<?php include_once('sidebar.php'); ?>
<?php include_once('../includes/config.php'); ?>
<?php

// REGISTER USER
if (isset($_POST['save_data'])) {
 
    // receive all input values from the form for next appointment
    $doctor = mysqli_real_escape_string($dbconnect, $_POST['doctor']);
    $patient = mysqli_real_escape_string($dbconnect, $_POST['patient']);
    $date = mysqli_real_escape_string($dbconnect, $_POST['date']);
   

    // form validation: ensure that the form is correctly filled ...
    //check if there is the any filed is empty
    if (empty($doctor) || empty($patient)  || empty($date)) {
        
        //return error to user
        $_SESSION['error'] = "All field are required";
        header("location:appointment_add.php");
    }

    else {

        // check if the doctor who sent data is the doctor whose loged in
        if($doctor == $_SESSION['userdata']['user_id']) {

            //generete appointment id
            $opp_id = rand(2343212, 89929818);

            $send_appointment_data = mysqli_query($dbconnect, "INSERT INTO 
            `tbl_appointment` (`opp_id`, `patient`, `doctor`, `reporting_date`)
            VALUES('$opp_id', '$patient', '$doctor', '$date')");

            //check if appointment data sent successfully
            if($send_appointment_data) {
                echo '<div class="alert alert-success">Appointment detail saved successfully</div>';
            }else {
                echo '<div class="alert alert-danger">Appointment detail Failed</div>';
            }

            echo '<a href="appointment.php" class="btn btn-success"> Ok go Back</a>';
           
        } else {
            echo '<div class="alert alert-danger">Bad Temper</div>';
        }
    }
}