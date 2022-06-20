<?php include_once('../includes/config.php'); ?>
<?php 
    if(isset($_GET['deactivate'])) {
        $appointment = $_GET['deactivate']; 
        if(mysqli_query($dbconnect, "UPDATE tbl_user SET active = 0 WHERE user_id = '$appointment'"  )) {
            header("location:doctor.php");
            exit;
        }
    }
    else if(isset($_GET['activate'])){
        $appointment = $_GET['activate']; 
        if(mysqli_query($dbconnect, "UPDATE tbl_user SET active = 1 WHERE user_id = '$appointment'")) {
            header("location:doctor.php");
            exit;
        }
    }

    else {
        echo '<script>
            alert("Bad access");
            document.location.href="doctor.php";
        </script>';
    }
?>
