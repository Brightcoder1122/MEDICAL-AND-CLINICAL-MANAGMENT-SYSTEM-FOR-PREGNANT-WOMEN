<?php require_once('sidebar.php') ?>
<?php if($type != 'admin'): ?>
    <?php header('location:index.php') ?>
<?php endif ?>
<?php if(!isset($_GET['reset_clinic'])): ?>
    <?php header('location:all_appointment.php') ?>
<?php endif ?>
<?php if(isset($_GET['reset_clinic'])): ?>
    <?php $appoint = $_GET['reset_clinic'] ?>
<?php endif ?>
<?php $query_doctor = mysqli_query($dbconnect,"SELECT * FROM tbl_user WHERE (((type) = 'admin'))") ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-5 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <a href="all_appointment.php" 
                            class="btn appoint-btn btn-sm">Back</a>
                        <h4 class="text-center">Reset Appointment Date</h4>
                        <hr>
                        <form action="reset_clinic_action.php" method="post">
                            <?php include_once('../includes/messages.php') ?>
                            <div class="row">
                                <div class="form-group mt-2 col-12">
                                    <input type="text" name="appoint" 
                                        value="<?php echo $appoint ?>" hidden>
                                    <label for="date" class="text-danger">Enter a new Appointment date</label>
                                    <input type="date" name="date" id="date" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group mt-2 col-6">
                                <input type="submit" name="reset" 
                                    value="Save changes" class="btn btn-sm appoint-btn" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('finish.php') ?>