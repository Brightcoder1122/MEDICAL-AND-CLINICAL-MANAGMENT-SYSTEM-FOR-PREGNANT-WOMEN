<?php require_once('includes/config.php'); ?>
<?php session_start(); ?>
<?php 
    //check if button signin is pressed
    if(isset($_POST['signin'])) {

        //recieve data from html input and store into variable
        $username = $_POST['username'];
        $password = $_POST['password'];

        //escape sql injection by escape_real_string
        $username = mysqli_real_escape_string($dbconnect, $username);
        $password = mysqli_real_escape_string($dbconnect, $password);

        //check if all field have data
        if(empty($username) || empty($password)) {
            $message = "All field are required";
            $_SESSION['error'] = $message;
            header("location:index.php");
        }
        
        //if all field have data
        else {
            //password decription
            $password = md5($password);

            //query to select user from database
            $query_user = mysqli_query($dbconnect, "SELECT *
                FROM tbl_user 
                WHERE ( ((username) = '$username')
                AND ((password) = '$password' )
                AND ((active) = 1))");
            
            //count how many row returned from the query
            $count_row = mysqli_num_rows($query_user);

            //check if number of rows equal to one
            if($count_row == 1) {
                //store user data in array
                $user_data = mysqli_fetch_assoc($query_user);
                $_SESSION['userdata'] = $user_data;
                $_SESSION['mustlogin'] = true;
                header("location:user/");
            } 

            else {

                $query_user = mysqli_query($dbconnect, "SELECT *
                FROM tbl_patient
                WHERE (((phone) = '$username')
                AND ((password) = '$password' ))");

                //count how many row returned from the query
                $count_row = mysqli_num_rows($query_user);

                if($count_row == 1) {
                    $pregnant_data = mysqli_fetch_assoc($query_user);
                    $_SESSION['pregnant'] = $pregnant_data;
                    $_SESSION['mustlogin'] = true;
                    header("location:user/preg_clinic.php");
                }
                else {
                    $_SESSION['error'] = "Invalid credentials please try again";
                    header("location:index.php");
                }
            }
        }

    }
?>