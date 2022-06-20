<?php require_once('sidebar.php') ?>

<!-- if requested user is pregnant  -->
<?php if(isset($_SESSION['pregnant'])):?>
<?php 
    $user = $_SESSION['pregnant']['patient_id'];
    $patient_data_query = mysqli_query($dbconnect, "SELECT * FROM tbl_patient WHERE patient_id = '$user'");
    $data = mysqli_fetch_array($patient_data_query);    
?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">User Data</h4>
                        <table class="table">
                            <tr>
                                <th width="20%">Full Name</th>
                                <td><?php echo "$data[fname] $data[mname] $data[lname]" ?></td>
                            </tr>
                            <tr>
                                <th>Sex</th>
                                <?php if($data['sex'] == 'f'): ?>
                                    <td>Female</td>
                                <?php endif ?>
                                <?php if($data['sex'] == 'm'): ?>
                                    <td>Male</td>
                                <?php endif ?>
                            </tr>
                                <th>Phone Number</th>
                                <td>0<?php echo $data['phone'] ?></td>
                            </tr>
                            </tr>
                                <th>Address</th>
                                <td><?php echo strtoupper($data['address1']) ?></td>
                            </tr>
                        </table>
                        <h4 class="text-center">Change Password</h4>
                        <form action="change_password.php" method="post">
                        <?php include_once('../includes/messages.php') ?>
                            <div class="mt-2 form-group">
                                <input type="password" name="old_pass" 
                                    class="form-control" placeholder="Current password">
                            </div>
                            <div class="mt-2 form-group">
                                <input type="password" name="password1" 
                                    class="form-control" placeholder="New password">
                            </div>
                            <div class="mt-2 form-group">
                                <input type="password" name="password2" 
                                    class="form-control" placeholder="Confirm password">
                            </div>
                            <div class="mt-2 form-group">
                                <input type="submit" name="patient_password" 
                                    value="Save Changes" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>


<!-- if requested user is doctor  -->
<?php if(isset($_SESSION['userdata'])):?>
<?php 
    $user = $_SESSION['userdata']['user_id'];
    $patient_data_query = mysqli_query($dbconnect, "SELECT * FROM tbl_user WHERE user_id = '$user'");
    $data = mysqli_fetch_array($patient_data_query);    
?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">User Data</h4>
                        <table class="table">
                            <tr>
                                <th width="20%">Full Name</th>
                                <td><?php echo "$data[fname] $data[mname] $data[lname]" ?></td>
                            </tr>
                            <tr>
                                <th>Sex</th>
                                <?php if($data['sex'] == 'f' || $data['sex'] == 'F'): ?>
                                    <td>Female</td>
                                <?php endif ?>
                                <?php if($data['sex'] == 'm' || $data['sex'] == 'M'): ?>
                                    <td>Male</td>
                                <?php endif ?>
                            </tr>
                                <th>Phone Number</th>
                                <td>0<?php echo $data['phone'] ?></td>
                            </tr>
                            </tr>
                                <th>Is Active</th>
                                <?php if($data['active'] == 1): ?>
                                    <td><span class="badge bg-success">Active</span></td>
                                <?php endif ?>
                                <?php if($data['sex'] == 'm'): ?>
                                    <td><span class="badge bg-danger">Not Active</span></td>
                                <?php endif ?>
                            </tr>
                            </tr>
                                <th>User Type</th>
                                <td><?php echo strtoupper($data['type']) ?></td>
                            </tr>
                            </tr>
                                <th>Username</th>
                                <td><?php echo strtoupper($data['username']) ?></td>
                            </tr>
                        </table>
                        <h4 class="text-center">Change Password</h4>
                        <form action="change_password.php" method="post">
                        <?php include_once('../includes/messages.php') ?>
                            <div class="mt-2 form-group">
                                <input type="password" name="old_pass" 
                                    class="form-control" placeholder="Current password">
                            </div>
                            <div class="mt-2 form-group">
                                <input type="password" name="password1" 
                                    class="form-control" placeholder="New password">
                            </div>
                            <div class="mt-2 form-group">
                                <input type="password" name="password2" 
                                    class="form-control" placeholder="Confirm password">
                            </div>
                            <div class="mt-2 form-group">
                                <input type="submit" name="user_password" 
                                    value="Save Changes" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
<?php require_once('finish.php') ?>