<?php require_once('sidebar.php') ?>
<?php if($type != 'admin'): ?>
    <?php header('location:index.php') ?>
<?php endif ?>
<?php $query_doctor = mysqli_query($dbconnect,"SELECT * FROM tbl_user WHERE (((type) = 'admin'))") ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xl-10 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <a href="doctor.php" 
                            class="btn appoint-btn btn-sm">Back</a>
                        <h4 class="text-center">New Doctor</h4>
                        <hr>
                        <form action="doctor_action.php" method="post">
                            <?php include_once('../includes/messages.php') ?>
                            <div class="row">
                                <div class="form-group mt-2 col-6">
                                    <input type="text" name="fname" id="fname" 
                                        placeholder="First Name" class="form-control" >
                                </div>
                                <div class="form-group mt-2 col-6">
                                    <input type="text" name="mname" id="mname" 
                                    placeholder="Middle Name" class="form-control" >
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="form-group mt-2 col-6">
                                    <input type="text" name="lname" id="lname" 
                                        placeholder="Last Name" class="form-control" >
                                </div>
                                <div class="form-group mt-2 col-6">
                                    <input type="number" name="phone" id="phone" 
                                        placeholder="Phone number" class="form-control" >
                                </div>
                            </div> 
                            <div class="row mt-2">
                                <div class="form-group mt-2 col-6">
                                    <select name="sex" class="form-control" >
                                        <option value="">--Select Sex--</option>
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
                                </div>
                                <div class="form-group mt-2 col-6">
                                    <select name="type" class="form-control" >
                                        <option value="">--Select Type--</option>
                                        <option value="admin">Admin</option>
                                        <option value="doctor">doctor</option>
                                        <option value="nurse">Nurse</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="row mt-2">
                                <div class="form-group mt-2 col-6">
                                    <input type="email" name="email" id="email" 
                                        placeholder="User email" class="form-control" >
                                </div>
                                <div class="form-group mt-2 col-6">
                                    <input type="text" name="username" id="username" 
                                        placeholder="Username" class="form-control" >
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="form-group mt-2 col-6">
                                    <input type="password" name="password" id="password" 
                                    placeholder="User Password" class="form-control" >
                                </div>
                            
                                <div class="form-group mt-2 col-6">
                                    <input type="password" name="password2" id="password2" 
                                    placeholder="Confirm Password" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group mt-2 col-6">
                                <input type="submit" name="add_user" 
                                    value="Add User" class="btn appoint-btn" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('finish.php') ?>