<?php require_once('sidebar.php') ?>
<?php if(isset($_SESSION['pregnant'])):?>
    <?php header('location:preg_clinic.php')?>
<?php endif ?>
<?php 
    $today = date('Y-m-d');
    $query_patient = mysqli_query($dbconnect,"SELECT tbl_patient.*, tbl_appointment.*, tbl_user.user_id, tbl_user.username
    FROM tbl_appointment, tbl_patient, tbl_user
    WHERE tbl_appointment.doctor = tbl_user.user_id
    AND tbl_appointment.patient = tbl_patient.patient_id") ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-primary">All Appointment</h5>
                        <?php include_once('../includes/messages.php') ?>
                        <div>
                            <div class="table">
                                <table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Patiant Name</th>
                                            <th>Doctor Name</th>
                                            <th>Phone number</th>
                                            <th>Sex</th>
                                            <th>Address</th>
                                            <th>Appointment date</th>
                                            <th>Status</th>
                                            <th>Action</th>
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
                                                <td><span class="badge bg-success">
                                                    <?php echo $patient_row['status'] ?><span></td>
                                                <td>
                                                    <?php if($patient_row['status'] == 'not saved'):?>
                                                        <a class="btn btn-sm btn-success" 
                                                            href="reset_clinic.php?reset_clinic=<?php echo $patient_row['opp_id'] ?>">
                                                            Reset</a>
                                                    <?php endif ?>
                                                    <?php if($patient_row['status'] == 'saved'):?>
                                                        <a class="btn btn-sm btn-warning" 
                                                            href="#">saved</a>
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