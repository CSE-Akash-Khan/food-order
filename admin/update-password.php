<?php include('partials/menue.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>

        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }
            // $id = $_GET['id'];
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td  colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
        
    </div>
</div>

<?php

    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // echo "clicked";
        if(isset($_SESSION['admin']))
        {
            $_SESSION['not-permit'] = "<div class='error'>Access denied</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
        //1. et the data from table
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //2. check whether the user with current id and password exist ot not
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

            //Execute the query
            $res = mysqli_query($conn, $sql);
            if($res)
            {
                //todo: check data is avialable or not
                $count = mysqli_num_rows($res);

                if($count == 1)
                {
                    //?user exist and password can be changed
                    // echo "User found";
                    //? check whether the new password and confirm password matched or not
                    if($new_password == $confirm_password)
                    {
                        // ?new and confirm password matched
                        //upadate the password
                        // echo "pass matched";

                        //sql query
                        $sql2 = "UPDATE tbl_admin SET
                            password = '$new_password'
                            WHERE id = $id
                        ";

                        //ecxecute query
                        $res2 = mysqli_query($conn, $sql2);

                        //?check query is executed or not
                        if($res2)
                        {
                             //?query executed
                            $_SESSION['change-pwd'] = "<div class='success'>password Updated Successfully</div>";
                            //redirect to manage admin page and display success message
                            header("location:".SITEURL.'admin/manage-admin.php');
                        }
                        else
                        {
                            //?failed to update password display
                            $_SESSION['change-pwd'] = "<div class='error'>Failed To Change Password</div>";
                            header("location:".SITEURL.'admin/manage-admin.php');
                        }
                    }

                    else
                    {
                        //Redirect to manage admin page with error message
                        $_SESSION['pwd-not-match'] = "<div class='error'>Password did not matched</div>";
                        //redirect the user
                        header("location:".SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    //todo: if not. user does not exist set massage and redirect
                    $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                    //redirect the user
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
            }
        }
    }

?>

<?php include('partials/footer.php'); ?>