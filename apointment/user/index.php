<?php require_once('sidebar.php') ?>
<?php if(isset($_SESSION['pregnant'])):?>
    <?php header('location:preg_clinic.php')?>
<?php endif ?>
<?php
    $today = date('Y-m-d');
    $tomorrow = date("Y-m-d");
    $tomorrow = date("Y-m-d", strtotime($tomorrow.'+1 day'));

    $user = mysqli_query($dbconnect, "SELECT * FROM tbl_user WHERE type = 'doctor'");
    $patient = mysqli_query($dbconnect, "SELECT * FROM tbl_patient");
    $appointment = mysqli_query($dbconnect, "SELECT * FROM tbl_appointment WHERE reporting_date = '$today' AND status='not saved'");
    $tommorow_appointment = mysqli_query($dbconnect, "SELECT * FROM tbl_appointment WHERE reporting_date = '$tomorrow '");
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card bg-success">
                <div class="card-body">
                    <div class="quantinty">
                        <i class="fa fa-envelope-open text-white fa-3x"></i>
                        <h4 class="text-light"></h4>
                       <a href="appointment.php"style="text-decoration: none;" class="h5 text-white">  <span class="h5 text-white">

                            <?php echo mysqli_num_rows($appointment) ?> today appointment</span></a></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger">
                <div class="card-body">
                    <div class="quantinty">
                        <i class="fa fa-envelope text-white fa-3x"></i>
                        <h4 class="text-light"></h4>
                        <a href="#"style="text-decoration: none;" class="h5 text-white"> <span class="h5 text-white">

                            <?php echo mysqli_num_rows($tommorow_appointment) ?> Tommorow</span></a>
                    </div>
                </div>
            </div>
        </div>
        <?php if($type == "admin"): ?>
        <div class="col-md-3">
            <div class="card bg-info">
                <div class="card-body">
                    <div class="quantinty">
                        <i class="fa fa-user text-white fa-3x"></i>
                        <h4 class="text-light"></h4>
                        <a href="doctor.php"style="text-decoration: none;" class="h5 text-white">  <span class="h5 text-white">
                            <?php echo mysqli_num_rows($user) ?> Doctor</span></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <div class="col-md-3">
            <div class="card bg-secondary">
                <div class="card-body">
                    <div class="quantinty">
                        <i class="fa fa-users text-white fa-3x"></i>
                        <h4 class="text-light"></h4>
                       <a href="patient.php"style="text-decoration: none;" class="h5 text-white">  <span class="h5 text-white">
                            <?php echo mysqli_num_rows($patient) ?> preg (women)</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>