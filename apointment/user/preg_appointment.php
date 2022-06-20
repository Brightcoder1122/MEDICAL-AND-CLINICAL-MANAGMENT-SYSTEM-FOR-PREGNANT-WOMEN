<?php require_once('sidebar.php') ?>

<!-- chack user if is not pregnant distroy session  -->
<?php if(!isset($_SESSION['pregnant'])):?>
    <?php header('location:../logout.php')?>
<?php endif ?>

<!-- All user data -->

<?php 
    $today = date('Y-m-d');
    $pregnant = $_SESSION['pregnant']['patient_id'];
    $query_patient = mysqli_query($dbconnect,"SELECT tbl_patient.*, tbl_appointment.*, tbl_user.user_id, tbl_user.username
    FROM tbl_appointment, tbl_patient, tbl_user
    WHERE tbl_appointment.doctor = tbl_user.user_id
    AND tbl_appointment.patient = tbl_patient.patient_id
    AND patient_id = '$pregnant'") ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="" class="btn appoint-btn btn-sm">Appointment History</a>
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
                                            <th>Address</th>
                                            <th>Appointment Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- loop for looping doctor -->
                                        <?php  $number = 1; while($patient_row=mysqli_fetch_array($query_patient)) {?>
                                            <tr>
                                                <td><?php echo $number++ ?></td>
                                                <td><?php echo "$patient_row[fname] $patient_row[lname]" ?></td>
                                                <td><?php echo $patient_row['username'] ?></td>
                                                <td><?php echo $patient_row['phone'] ?></td>
                                                <td><?php echo $patient_row['sex'] ?></td>
                                                <td><?php echo "$patient_row[address1] / $patient_row[address2]" ?></td>
                                                <td><?php echo "$patient_row[reporting_date]" ?></td>
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