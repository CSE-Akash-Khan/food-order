<?php

    //Authorization - Access Control
    // Check whether the user logged in or not
    if(!isset($_SESSION['user'])) //if user session is not set
    {
        //user is not logged in
        //Redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access panel.</div>";
        //redirect
        header('location:'.SITEURL.'admin/login.php');
    }

?>