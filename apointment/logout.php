<?php 
 session_start();
 session_destroy();
 session_unset();
 unset($_SESSION['userdata']);

 header("location:index.php");
?>