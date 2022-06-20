<?php require_once('sidebar.php') ?>
<?php $doctor = $_SESSION['userdata']['user_id']; ?>
<?php $query_doctor = mysqli_query($dbconnect,"SELECT * FROM tbl_user WHERE (((type) = 'admin'))") ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <a href="appointment.php" 
                            class="btn appoint-btn btn-sm">Back</a>
                        <h4 class="text-center mt-2">Appointment</h4>
                        <hr>
                        <form action="appointment_action.php" method="post">
                            <?php include_once('../includes/messages.php') ?>
                            <div class="row mt-2">
                                <div class="form-group mt-2 col-12">
                                    <input type="number" name="doctor" hidden
                                        value="<?php echo $doctor ?>" class="form-control">

                                    <?php $select = mysqli_query($dbconnect, "SELECT patient_id, fname, lname FROM tbl_patient"); ?>
                                    <select name="patient" class="form-control" requires>
                                        <option value="">--Select patient--</option>
                                        <?php while($patient_data = mysqli_fetch_array($select)){?>
                                            <option value="<?php echo $patient_data['patient_id'] ?>">
                                                <?php echo " $patient_data[fname] $patient_data[lname]"?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mt-1 col-12">
                                    <label for="next_date" class="text-danger">
                                        --Please set date for appointment--</label>
                                    <input type="date" name="date" id="next_date" 
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