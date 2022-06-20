<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body">
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-5 col-sm-12 col-xl-5 col-xs-12  border">
            <h3 class="text-uppercase text-center text-white pt-4">Medical and clinical managment system for gravida</h3>
            <hr>
                <div class="">
                    <div class="card-body">
                        <?php require_once('includes/messages.php') ?>
                        <form action="login.php" method="post">
                            <div class="form-group mt-2">
                                <input type="text" name="username" id="username" 
                                    placeholder="username" class="form-control" >
                            </div>
                            <div class="form-group mt-2">
                                <input type="password" name="password" id="password" 
                                placeholder="password" class="form-control" >
                            </div>
                            <div class="form-group mt-2">
                                <input type="submit" name="signin" id="signin" value="Sign in"
                                    class="btn btn-info">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>