<?php include_once('../includes/config.php'); ?>
<?php require_once('sidebar.php') ?>
<?php  error_reporting(0) ?>
<?php
    $tomorrow = date("Y-m-d");
    $tomorrow = date("Y-m-d", strtotime($tomorrow.'+1 day'));
    $today = date("Y-m-d");
    // echo $tomorrow;

    $today_sms = mysqli_query($dbconnect, "SELECT `date` FROM tbl_reminder WHERE `date`='$today'");
    $count_today_sms_row = mysqli_num_rows($today_sms);

    if($count_today_sms_row == 0) {

        if(mysqli_query($dbconnect, "INSERT INTO tbl_reminder(`reminder_id`, `date`) VALUE (NULL, '$today')")) {

            $select_appointment = mysqli_query($dbconnect, "SELECT tbl_patient.*, tbl_appointment.*, tbl_user.user_id, tbl_user.username
            FROM tbl_appointment, tbl_patient, tbl_user
            WHERE tbl_appointment.doctor = tbl_user.user_id
            AND tbl_appointment.patient = tbl_patient.patient_id
            AND reporting_date = '$tomorrow'
            AND status='not saved'");

            if(mysqli_num_rows($select_appointment) == 0) {
                echo "<div class='alert alert-danger'>No aapointment on (<b>$tomorrow</b>)</div>";
                echo "<a href='appointment.php' class='btn btn-primary'>Go back</a>";
            }

            else {
                while($data = mysqli_fetch_array($select_appointment)) {
                    $id = rand(20, 3209);
                    $phone = "255$data[phone]";
                    $full_name = strtoupper("$data[fname] $data[lname]");
                    $body = "Hello $full_name We are reminding your that tomorror is your clinic day. please attende it on time Habari ndugu $full_name Kesho ni siku yako ya kliniki tafadhari fika kwa wakati hospitali ya rufaa Dodoma";
                    echo $phone;
                    send_sms($id, $phone, $body);
                }
            }
        }
        else {
            echo 'unknown';
        }
    } else {
        echo "<div class='alert alert-danger'>you have allready sent sms to patiant today (<b>$tomorrow</b>)</div>";
        echo "<a href='appointment.php' class='btn btn-primary'>Go back</a>";
    }
 
function send_sms($id, $phone, $body) {
    $tomorrow = date("Y-m-d");
    $tomorrow = date("Y-m-d", strtotime($tomorrow.'+1 day'));
    $api_key='2799f1a807695012';
    $secret_key = 'YTU2NTkxZjQxZDc4NTY2NGZiZTVkYzI5ZWU1MzFmYzM4NzA4MTBkYjk5NWE4MzZmZmU0MjQ2OTU3YjJjN2IxZg====';

    $postData = array(
        'source_addr' => 'INFO',
        'encoding'=>0,
        'schedule_time' => '',
        'message' => $body,
        'recipients' => [array('recipient_id' => $id ,'dest_addr'=>$phone)]
    );

    $Url ='https://apisms.beem.africa/v1/send';

    $ch = curl_init($Url);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));

    $response = curl_exec($ch);

    if($response === FALSE){
        echo $response;
        die(curl_error($ch));
    }

    else {
        echo "<div class='alert alert-success'>You have already sent message for (<b>$tomorrow</b>) clinic attenders</div>";
        echo "<a href='appointment.php' class='btn btn-primary'>Go back</a>";
    }
    var_dump($response);
}