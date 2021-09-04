<?php 
    //include constant.php file here
    include('../config/constants.php');
    if(isset($_SESSION['admin']))
    {
        $_SESSION['not-permit'] = "<div class='error'>Access denied</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{

    //1. get the id of admin to be deleted
    $id = $_GET['id']; 
    //2. create SQL query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id = $id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //checke whether the query executed successfully or not
    if($res)
    {
        //Query executed successfully and admin deleted
        // echo "Admin Deleted Successfully";
        //create session varaible to display message
        $_SESSION['delete'] = "<div class='success'> Admin Deleted Successfully.</div>";
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to delete n
        echo "Failed to delete admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    //3. Redirect to manage admin page with message (seccess/error)
    }

?> 