<?php require_once('sidebar.php') ?>
<?php if(!isset($_GET['pregnant'])):?>
    <?php echo "<h1 class='text-center text-danger'>Bad access</h1>" ?>
<?php endif ?>

<?php 
    $pregnant = $_GET['pregnant'];
    $clinic_query = mysqli_query($dbconnect, "SELECT tbl_patient.*, tbl_appointment.*, tbl_clinic.*, tbl_user.username FROM 
    tbl_patient, tbl_clinic, tbl_appointment, tbl_user
    WHERE tbl_clinic.appointment = tbl_appointment.opp_id
    AND tbl_clinic.treated_by = tbl_user.user_id
    AND tbl_appointment.patient = tbl_patient.patient_id
    AND tbl_patient.patient_id = ' $pregnant'");

    $patient = mysqli_query($dbconnect, "SELECT fname, lname FROM tbl_patient WHERE patient_id='$pregnant'");

    $data = mysqli_fetch_array($patient);
    $count_data = mysqli_num_rows($clinic_query);
?>

<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center" >
                            Clinic History Of <?php echo "$data[fname] $data[lname]"  ?></h5>
                        <hr>
                        <div class="table-responsive">
                            <div class="table">
                                <table class="table table-striped table-sm table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Patiant Name</th>
                                            <th>Doctor Name</th>
                                            <th>Phone number</th>
                                            <th>Sex</th>
                                            <th>Comment</th>
                                            <th>Medicine</th>
                                            <th>Appointment Date</th>
                                            <th>Clinic date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($count_data >= 1): ?>
                                        <!-- loop for looping doctor -->
                                        <?php  $number = 1; while($patient_row=mysqli_fetch_array($clinic_query)) {?>
                                            <tr>
                                                <td><?php echo $number++ ?></td>
                                                <td><?php echo "$patient_row[fname] $patient_row[lname]" ?></td>
                                                <td><?php echo $patient_row['username'] ?></td>
                                                <td><?php echo $patient_row['phone'] ?></td>
                                                <td><?php echo $patient_row['sex'] ?></td>
                                                <td><?php echo $patient_row['comment'] ?></td>
                                                <td><?php echo $patient_row['medicin_given'] ?></td>
                                                <td><?php echo "$patient_row[reporting_date]" ?></td>
                                                <td><?php echo $patient_row['created_date'] ?></td>
                                                <td>
                                                    <?php if($patient_row['status'] == 'saved'): ?>
                                                        <span class="badge bg-success">
                                                        <?php echo $patient_row['status'] ?><span>
                                                    <?php else: ?>
                                                        <span class="badge bg-danger">
                                                        <?php echo $patient_row['status'] ?><span>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php endif ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('finish.php') ?>