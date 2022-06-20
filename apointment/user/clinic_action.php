<?php include_once('sidebar.php'); ?>
<?php include_once('../includes/config.php'); ?>
<?php

// REGISTER USER
if (isset($_POST['save_data'])) {
 
    // receive all input values from the form for clinic
    $appointment = mysqli_real_escape_string($dbconnect, $_POST['appointment']);
    $doctor = mysqli_real_escape_string($dbconnect, $_POST['doctor']);
    $problem = mysqli_real_escape_string($dbconnect, $_POST['problem']);
    $suggestion = mysqli_real_escape_string($dbconnect, $_POST['suggestion']);
    $medicine = mysqli_real_escape_string($dbconnect, $_POST['medicice']);

    // receive all input values from the form for next appointment
    $doctor = mysqli_real_escape_string($dbconnect, $_POST['doctor']);
    $patient = mysqli_real_escape_string($dbconnect, $_POST['patient']);
    $next_date = mysqli_real_escape_string($dbconnect, $_POST['next_date']);
   

    // form validation: ensure that the form is correctly filled ...
    //check if there is the any filed is empty
    if (empty($appointment) || empty($doctor) || empty($problem) || empty($suggestion) || 
        empty($medicine) || empty($doctor) || empty($patient)  || empty($next_date)) {
        
        //return error to user
        echo '<div class="alert alert-danger">All field are required </div>';
        echo '<a href="appointment.php" class="btn btn-success"> Ok go Back</a>';
        header("location:patient_add.php");
    }
    else {
        $click_id = rand(12109,898577);

        // check if the doctor who sent data is the doctor whose loged in
        if($doctor == $_SESSION['userdata']['user_id']) {
            $send_clinic_data = mysqli_query($dbconnect, "INSERT INTO 
            `tbl_clinic` (`clinic_id`, `appointment`, `treated_by`, `problem`, `comment`, `medicin_given`)
            VALUES('$click_id', '$appointment', '$doctor', '$problem', '$suggestion', '$medicine')");
            
            if($send_clinic_data) {
                // return suucess messeg if user registured successfully
                echo '<div class="alert alert-success">Clinic detail saved successfully</div>';

                //submit next clinic data
                $opp_id = rand(2343212, 89929818);
                $send_appointment_data = mysqli_query($dbconnect, "INSERT INTO 
                `tbl_appointment` (`opp_id`, `patient`, `doctor`, `reporting_date`)
                VALUES('$opp_id', '$patient', '$doctor', '$next_date')");

                //check if appointment data sent successfully
                if($send_appointment_data) {
                    
                    if(mysqli_query($dbconnect, "UPDATE tbl_appointment SET status='saved' WHERE opp_id='$appointment' ")) {
                        echo '<div class="alert alert-success">Appointment detail saved successfully</div>';
                    }
                    else {
                        echo '<div class="alert alert-danger">Faield to update Appointment</div>';
                    }

                }else {
                    echo '<div class="alert alert-danger">Appointment detail Failed</div>';
                }

                echo '<a href="appointment.php" class="btn btn-success"> Ok go Back</a>';
            }
            else {
                $error = mysqli_error($dbconnect);
                echo '<div class="alert alert-danger">'.$error.'</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Bad Temper</div>';
        }
    }
}