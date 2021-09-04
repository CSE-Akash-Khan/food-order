<?php include('partials/menue.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br /> <br />

        <?php
            if(isset($_SESSION['add'])) //checking whether the session set or not
            {
                echo $_SESSION['add']; //display session message if set
                unset($_SESSION['add']); //remove session message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="Username" placeholder="Your User Name"></td>
                </tr>

                <tr>
                    <td>password: </td>
                    <td><input type="password" name="Password" placeholder="Your Password"></td>
                </tr>

                <tr>
                    <td  colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    //process the value from form and save it in database
    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //button clicked
        if(isset($_SESSION['admin']))
        {
            $_SESSION['not-permit'] = "<div class='error'>Access denied</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else{
        // echo "Button Clicked";

        //1. get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['Username'];
        $password = md5($_POST['Password']); //!password encryption with md5

        //2. sql query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        //3. Executing quary and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error()); //if rais error die stop farther process

        //4. check whether the (Quary is executed) data is inserted or not and display approiate message
        if($res)
        {
            //data inserted
            // echo "Data Successfully Inserted";
            //?create a session varable to display message
            $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
            //redirect PAGE TO MANAGE ADMIN
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //failed to insert data
            // echo "Faile to Insert Data";
            //create a session varable to display message
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
            //redirect PAGE TO add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
        }
    }
    
?>
