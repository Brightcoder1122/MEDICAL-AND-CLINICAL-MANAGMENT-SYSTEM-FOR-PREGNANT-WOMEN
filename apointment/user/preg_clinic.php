<?php require_once('sidebar.php') ?>
<?php if(!isset($_SESSION['pregnant'])):?>
    <?php header('location:../logout.php')?>
<?php endif ?>

<?php 
    $pregnant = $_SESSION['pregnant']['patient_id'];
    $clinic_query = mysqli_query($dbconnect, "SELECT tbl_patient.*, tbl_appointment.*, tbl_clinic.*, tbl_user.username FROM 
    tbl_patient, tbl_clinic, tbl_appointment, tbl_user
    WHERE tbl_clinic.appointment = tbl_appointment.opp_id
    AND tbl_clinic.treated_by = tbl_user.user_id
    AND tbl_appointment.patient = tbl_patient.patient_id
    AND tbl_patient.patient_id = ' $pregnant'");
?>

<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="" class="btn appoint-btn btn-sm">Clinic History</a>
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