<?php require_once('sidebar.php') ?>
<?php if($type != 'admin'): ?>
    <?php header('location:index.php') ?>
<?php endif ?>
<?php $query_doctor = mysqli_query($dbconnect,"SELECT * FROM tbl_user WHERE (((type) = 'doctor'))") ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="doctor_add.php" 
                            class="btn appoint-btn btn-sm">New Doctor</a>
                            <hr>
                            <?php include_once('../includes/messages.php') ?>
                        <div>
                            <div class="table">
                                <table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>FP-NUMBER</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone number</th>
                                            <th>Email</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- loop for looping doctor -->
                                        <?php  $number = 1; while($doctor_row=mysqli_fetch_array($query_doctor)) {?>
                                            <tr>
                                                <td><?php echo $number++ ?></td>
                                                <td><?php echo $doctor_row['fname'] ?></td>
                                                <td><?php echo $doctor_row['lname'] ?></td>
                                                <td><?php echo $doctor_row['phone'] ?></td>
                                                <td><?php echo $doctor_row['email'] ?></td>
                                                <td>
                                                    <?php if($doctor_row['active'] == 1): ?>
                                                        <a href="activator.php?deactivate=<?php echo $doctor_row['user_id'] ?>">
                                                            <span href="" class="badge bg-success">active</span></a>
                                                    <?php else: ?>
                                                        <a href="activator.php?activate=<?php echo $doctor_row['user_id'] ?>">
                                                        <span href="" class="badge bg-danger">active</span></a>
                                                    <?php endif ?>
                                                <td>
                                                    <a href="doctor_edit.php?user_edit=<?php echo $doctor_row['user_id'] ?>"
                                                    class="btn btn-sm btn-light"><i class="fa fa-pencil text-warning"></i></a>
                                                    <a href="doctor_action.php?reset=<?php echo $doctor_row['user_id'] ?>"
                                                    class="btn btn-sm btn-success">Reset </a>
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