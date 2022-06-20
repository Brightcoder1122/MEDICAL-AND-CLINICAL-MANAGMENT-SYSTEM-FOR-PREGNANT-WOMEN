<?php require_once('sidebar.php') ?>
<?php $query_patient = mysqli_query($dbconnect,"SELECT * FROM tbl_patient") ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="patient_add.php" 
                            class="btn appoint-btn btn-sm">New Patient</a>
                            <hr>
                            <?php include_once('../includes/messages.php') ?>
                        <div class="">
                            <div class="table">
                                <table class="table table-striped table-sm table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>card no</th>
                                            <th>Phone number</th>
                                            <th>Sex</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- loop for looping doctor -->
                                        <?php  $number = 1; while($patient_row=mysqli_fetch_array($query_patient)) {?>
                                            <tr>
                                                <td><?php echo $number++ ?></td>
                                                <td><?php echo $patient_row['fname'] ?></td>
                                                <td><?php echo $patient_row['lname'] ?></td>
                                                <td><?php echo $patient_row['phone'] ?></td>
                                                <td><?php echo $patient_row['sex'] ?></td>
                                                <td><?php echo $patient_row['address1'] ?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-success" href="clinics.php?pregnant=<?php echo $patient_row['patient_id'] ?>">
                                                       <i class="fa fa-eye fa-lg"></i></a>
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