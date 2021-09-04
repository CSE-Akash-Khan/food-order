<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login -  Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>

            <br><br>
            <!-- login form starts here -->
            <form action="" method="POST" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="Enter Username"><br><br>
                Password: <br>
                <input type="password" name="password" placeholder="Enter Password"><br><br>

                <input type="submit" name="submit" value="Login" class="btn-primary">
                <br><br>
            </form>
            <!-- login form ends here -->

            <p style="color:white;" class="text-center">Created By - <a style="color:red;" href="#">Fearless Five</a></p>
            <!-- <p style="color:red;">This is a paragraph.</p> -->

        </div>

    </body>
</html>

<?php

    //check whether the submit button clicked or not
    if(isset($_POST['submit']))
    {
        //process login
        //1. get the data from login form
        
        //this function will safe us from hacker attack. hacker can be pass single code for destroy our database
        //but this function return all special character as string value
        //todo: this type of attack called sql injection attack

        // $username = $_POST['username'];
        $username = mysqli_real_escape_string($conn, $_POST['username']);

        $password = md5($_POST['password']);

        //2. check username and password exist or not
        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
        
        //3. Execute query
        $res = mysqli_query($conn, $sql);

        //4. check rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            //user found and login success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div><br>";
            $_SESSION['user'] = "SET"; //to check whether the user is logged in or not. and logout will unset it
            $_SESSION['name'] = "<div class='success-name'>Hi $username</div>";
            if($username == 'Admin')
            {
                $_SESSION['admin'] = "SET";
            }
            //redirect to index.php page
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //user not found and login failed
            $_SESSION['login'] = "<div class='error text-center'>Login Failed. Username And Password Did not Matched.</div>";
            //redirect to index.php page
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>