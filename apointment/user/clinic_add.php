<?php require_once('sidebar.php') ?>
<?php if(!isset($_GET['add_clinic']) || !isset($_GET['add_clinic'])): ?>
    <?php header("location:appointment.php"); exit ?>
<?php endif ?>

<?php 
    $appointment = $_GET['add_clinic']; 
    $doctor = $_SESSION['userdata']['user_id'];
    $patient = $_GET['patient'];
?>
<?php $query_doctor = mysqli_query($dbconnect,"SELECT * FROM tbl_user WHERE (((type) = 'admin'))") ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <a href="appointment.php" 
                            class="btn appoint-btn btn-sm">Back</a>
                        <h4 class="text-center">Clinic Progress Detail</h4>
                        <hr>
                        <form action="clinic_action.php" method="post">
                            <?php include_once('../includes/messages.php') ?>
                            <div class="row">
                                <div class="form-group col-6">
                                    <input type="text" name="appointment" hidden
                                    value="<?php echo $appointment ?>" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <input type="text" name="doctor" hidden
                                    value="<?php echo $doctor ?>"  class="form-control" >
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="form-group mt-2 col-12">
                                    <textarea type="text" name="problem" rows="3"
                                        placeholder="Problem ('s)" class="form-control" ></textarea>
                                </div>
                                <div class="form-group mt-3 col-12">
                                    <textarea type="text" name="suggestion" rows="3"
                                        placeholder="Suggestion" class="form-control" ></textarea>
                                </div>
                            </div> 
                            <div class="row mt-2">
                                <div class="form-group mt-2 col-12" rows="3">
                                <textarea type="text" name="medicice" 
                                        placeholder="Assigned Medicine" class="form-control" ></textarea>
                                </div>
                            </div>
                            <h4 class="text-center mt-2">Next Clinic Detail</h4>
                            <hr>
                            <div class="row mt-2">
                                <div class="form-group mt-2 col-6">
                                    <input type="number" name="doctor" hidden
                                    value="<?php echo $doctor ?>" class="form-control" >
                                </div>
                                <div class="form-group mt-2 col-6">
                                    <input type="number" name="patient" hidden
                                    value="<?php echo $patient ?>" class="form-control" >
                                </div>
                                <div class="form-group mt-1 col-6">
                                    <label for="next_date" class="text-danger">
                                        --Please set date for next appointment--</label>
                                    <input type="date" name="next_date" id="next_date" 
                                    value="<?php echo $patient ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group mt-2 col-6">
                                <input type="submit" name="save_data" 
                                    value="Save data" class="btn appoint-btn" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('finish.php') ?>