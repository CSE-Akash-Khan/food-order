<?php include('partials/menue.php') ?>

        <!--Main content section start-->
        <div class = "main-content">
            <div class = "wrapper">  
                <h1>Manage Admin</h1>
                <br />
               
                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //display session message
                        unset($_SESSION['add']); //remove session message
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }
                    if(isset($_SESSION['not-permit']))
                    {
                        echo $_SESSION['not-permit'];
                        unset($_SESSION['not-permit']);
                    }
                ?>
                <br><br><br>

                <!-- button to add admin -->
                <a href="add-admin.php" class = "btn-primary">Add Admin</a>
                
                <br /><br /><br />
                

                <table class = "tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>User name</th>
                        <th>Actions</th>
                    </tr>


                    <!-- //todo: All data retrive form database and present webpage -->
                    <?php
                        //Query to get all admin                       
                        $sql = "SELECT * FROM tbl_admin";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //check whether the Query is execute or not
                        if($res)
                        {
                            //count rows to check whether we have data in dabase or not
                            $count = mysqli_num_rows($res); //Funtion to get all the rows in database

                            
                            //check the number of rows
                            if($count>0)
                            {
                                $sn = 1; // create variable and assign the value
                                // we have data in database
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                    //using while loop get all the data from database
                                    //and while loop will run as long as we have data in database

                                    //get individual data
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];
                                    
                                    //display the values in our table
                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                                
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            else
                            {
                                //we do not have data in database

                            }
                        }
                    ?>


                </table>

            </div>
        </div>
        <!--Main content section end-->

<?php include('partials/footer.php') ?>