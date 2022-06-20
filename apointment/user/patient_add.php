<?php require_once('sidebar.php') ?>
<?php $query_doctor = mysqli_query($dbconnect,"SELECT * FROM tbl_user WHERE (((type) = 'admin'))") ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xl-10 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <a href="patient.php" 
                            class="btn appoint-btn btn-sm">Back</a>
                        <h4 class="text-center">New Patient</h4>
                        <hr>
                        <form action="patient_action.php" method="post">
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
                                    <input type="radio" name="sex" class="radio" value="m"> Male
                                    <input type="radio" name="sex" class="radio" value="f"> female
                                </div>
                            </div> 
                            <div class="row mt-2">
                                <div class="form-group mt-2 col-6">
                                    <input type="text" name="address1" 
                                    placeholder="First Address" class="form-control" >
                                </div>
                            
                                <div class="form-group mt-2 col-6">
                                    <input type="text" name="address2" 
                                    placeholder="Second Address" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group mt-2 col-6">
                                <input type="submit" name="add_patient" 
                                    value="Add User" class="btn appoint-btn" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('finish.php') ?>