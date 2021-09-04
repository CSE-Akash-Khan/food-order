<?php include('partials/menue.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br /><br />

        <?php
            //todo: for add food
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        
            //todo: for delete food
            if(isset($_SESSION['remove']))//if failed to delete image
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['unauthorized']))
            {
                echo $_SESSION['unauthorized'];
                unset($_SESSION['unauthorized']);
            }

            //todo: for update
            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }


            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['remove-failed']))
            {
                echo $_SESSION['remove-failed'];
                unset($_SESSION['remove-failed']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        
        ?>

        <br><br>
               
                <!-- button to add Food -->
                <a href="<?php echo SITEURL; ?>admin/add-food.php" class = "btn-primary">Add Food</a>
                
                <br /><br /><br />
                

                <table class = "tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                    

                    <?php
                        //create a sql query to get all the food
                        $sql = "SELECT * FROM tbl_food";

                        //execute query
                        $res = mysqli_query($conn, $sql);

                        //count rows to check whether we have foods or not
                        $count = mysqli_num_rows($res);

                        if($count > 0)
                        {
                            $sn = 1;
                            //we have food and display all food
                            while($row = (mysqli_fetch_assoc($res)))
                            {
                                //store all data individual variable
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td>
                                            <?php 
                                            
                                                if($image_name != "")
                                                {
                                                    //display image
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                                    <?php
                                                }
                                                else
                                                {
                                                    //dsiplay error message
                                                    echo "<div class='error'>Image Not Added. </div>";
                                                }
                                            
                                            ?>
                                        </td>
                                        <td style="font-weight:bold;"><?php echo $featured; ?></td>
                                        <td style="font-weight:bold;"><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                                        </td>
                                    </tr>
                                <?php

                            }
                        }
                        else
                        {
                            //no food in database
                            echo "<tr><td colspan='7'>Food not Added Yet. </td></tr>";
                        }
                    ?>

                </table>
    </div>
</div>

<?php include('partials/footer.php') ?>