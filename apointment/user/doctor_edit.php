<?php require_once('sidebar.php') ?>
<?php if($type != 'admin'): ?>
    <?php header('location:index.php') ?>
<?php endif ?>
<?php if(isset($_GET['user_edit'])): ?>
    <?php $user_id = $_GET['user_edit'] ?>
    <?php $query_doctor = mysqli_query($dbconnect,"SELECT * FROM tbl_user WHERE (((user_id) = '$user_id'))") ?>
    <?php $data = mysqli_fetch_array($query_doctor) ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xl-10 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="doctor.php" 
                                class="btn appoint-btn btn-sm">Back</a>
                            <h4 class="text-center">Edit Doctor</h4>
                            <hr>
                            <form action="doctor_action.php" method="post">
                                <?php include_once('../includes/messages.php') ?>
                                <div class="row">
                                    <div class="form-group mt-2 col-6">
                                        <input type="text" name="fname" value="<?php echo $data['fname'] ?>"
                                            class="form-control" >
                                    </div>
                                    <div class="form-group mt-2 col-6">
                                        <input type="text" name="mname" value="<?php echo $data['mname'] ?>"
                                        class="form-control" >
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group mt-2 col-6">
                                        <input type="text" name="lname" value="<?php echo $data['lname'] ?>"
                                        class="form-control" >
                                    </div>
                                    <div class="form-group mt-2 col-6">
                                        <input type="number" name="phone" value="<?php echo $data['phone'] ?>"
                                            class="form-control" >
                                    </div>
                                </div> 
                                <div class="row mt-2">
                                    <div class="form-group mt-2 col-6">
                                        <select name="sex" class="form-control" >
                                            <option value="<?php echo $data['sex'] ?>"><?php echo $data['sex'] ?></option>
                                            <option value="m">Male</option>
                                            <option value="f">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2 col-6">
                                        <select name="type" class="form-control" >
                                            <option value="<?php echo $data['type'] ?>"><?php echo $data['type'] ?></option>
                                            <option value="admin">Admin</option>
                                            <option value="doctor">doctor</option>
                                            <option value="nurse">Nurse</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="row mt-2">
                                    <div class="form-group mt-2 col-6">
                                        <input type="email" name="email" value="<?php echo $data['email'] ?>"
                                            class="form-control" >
                                    </div>
                                    <div class="form-group mt-2 col-6">
                                        <input type="text" name="username" value="<?php echo $data['username'] ?>"
                                            class="form-control" >
                                        <input type="text" name="user_id" value="<?php echo $data['user_id'] ?>"
                                            class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group mt-2 col-6">
                                    <input type="submit" name="edit_user" 
                                        value="Save User" class="btn appoint-btn" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
<?php require_once('finish.php') ?>