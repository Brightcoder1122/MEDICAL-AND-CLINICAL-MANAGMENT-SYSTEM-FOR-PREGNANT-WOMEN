<?php session_start() ?>

<!-- check if user loged in -->
<?php if(!isset($_SESSION['mustlogin'])): ?>
    <?php header('location:../logout.php') ?>
<?php endif ?>

<!-- database connection -->
<?php include('../includes/config.php') ?>

<?php 
    //user datail 
    if(isset($_SESSION['userdata'])) {$type = $_SESSION['userdata']['type'];}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Appointment-Panel</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favin.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="../css/style.css">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- datatable  -->
        <link rel="stylesheet" href="../asset/datatables.min.css">
        <link rel="stylesheet" href="../asset/responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../asset/responsive/css/responsive.dataTables.min.css">
        
        <style>
            .appoint-background {
                background-color: rgb(6, 109, 194);
            }
            .list-group-item:hover {
                background-color: rgb(100, 109, 194);
            }
            .appoint-btn {
                background-color: rgb(6, 109, 194);
                color:white;
            }
            .appoint-btn:hover {
                background-color: rgb(97, 109, 194);
                color:white;
            }
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end appoint-background" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom appoint-background text-white">
                    <b style="font-size: 12px; color: pink;">Medical & clinical for gravida</b>
                </div>
                <div class="list-group list-group-flush">
                <?php if(isset($_SESSION['userdata'])): ?>
                    <?php if($type == 'admin' || $type == 'doctor'): ?>
                        <a class="list-group-item list-group-item-action appoint-background 
                            text-light p-3" href="index.php"><b>Dashboard</b></a>
                        <?php if($type == 'admin'): ?>
                        <a class="list-group-item list-group-item-action appoint-background 
                            text-light p-3" href="doctor.php"><b>Doctors</b></a>
                        <?php endif ?>
                        <a class="list-group-item list-group-item-action appoint-background 
                            text-light p-3" href="patient.php"><b>Pregnant</b></a>
                        <a class="list-group-item list-group-item-action appoint-background 
                            text-light p-3" href="appointment.php"><b>Appointment</b></a>
                        <?php if($type == 'admin'): ?>
                        <a class="list-group-item list-group-item-action appoint-background 
                            text-light p-3" href="all_appointment.php"><b>All Appointment</b></a>
                        <?php endif ?>
                    <?php endif ?><!-- check if user have type end here  -->
                <?php endif ?><!-- check session if isset end here  -->
                <!-- pregnant -->
                    <?php if(isset($_SESSION['pregnant'])): ?>
                    <a class="list-group-item list-group-item-action appoint-background 
                        text-light p-3 nav-hover" href="preg_clinic.php"><b>Clinic History</b></a>
                    <a class="list-group-item list-group-item-action appoint-background 
                        text-light p-3 nav-hover" href="preg_appointment.php"><b>Appointment History</b></a>
                    <?php endif ?>
                    <a class="list-group-item list-group-item-action appoint-background 
                        text-light p-3 nav-hover" href="profile.php"><b>Profile</b></a>
                    <a class="list-group-item list-group-item-action appoint-background
                        text-light p-3" href="../logout.php"><b>Logout</b></a>
                
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#!">
                                        Welcome <b>
                                            <?php if(isset($_SESSION['userdata'])): ?>
                                            <?php echo $_SESSION['userdata']['username'] ?>
                                            <?php endif ?>
                                            <?php if(isset($_SESSION['pregnant'])): ?>
                                            <?php echo $_SESSION['pregnant']['fname'] ?>
                                            <?php endif ?>
                                        </b></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid p-3">
