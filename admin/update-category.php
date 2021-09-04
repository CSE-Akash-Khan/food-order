<?php include('partials/menue.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php
        
            //todo: 1. bring all data form database and show the form
            //?........................................................................
            //check whether the id checked or not
            if(isset($_GET['id']))
            {
                //todo: get the id and all other details
                $id = $_GET['id'];
                //create aql Query get all other details
                $sql = "SELECT * FROM tbl_category WHERE id = $id";
                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //cont the rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                //todo: Security Feature
                if($count == 1)
                {
                    //get all the data
                    $row = mysqli_fetch_assoc($res);
                    //get individual data
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

                }
                else
                {
                    //redirect to manage category
                    $_SESSION['no-category-found'] = "<div class='error'>Category Not Found</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                    
                }
                //?.......................................................................................
            }
            else
            {
                //todo: Security Feature
                //redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //display session message
                $_SESSION['unauthorized'] = "<div class='error'>Unauthorized Access</div>";
            }
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image </td>
                    <td>
                        <?php 
                            if($current_image != "")
                            {
                                //display the image
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="100px">
                                <?php
                            }
                            else
                            {
                                //display message
                                echo "<div class='error'>Image not Added</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured </td>
                    <td>
                        <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured == "No"){echo "checked";} ?>  type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        
        <!-- //todo: 2. updated data sote in database -->
        <!-- //? ........................................................................................................ -->
        
        <?php
        
            if(isset($_POST['submit']))
            {
                // echo "clicked";
                //1. get all the value from our form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image']; //here stored image name not image
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //2. Upload new image if selected
                //check whether the image selected or not
                if(isset($_FILES['image']['name']))
                {
                    //get the image details
                    $image_name = $_FILES['image']['name'];
                    
                    //?check whether the image is available or not
                    /*some times when we click coose file $_FILES value became set
                    but if we not set any image variable name became empty that's why we need check that it is empty or not*/
                    if($image_name != "")
                    {
                        //image available
                        //todo: A. upload the new image

                        //auto rename  our image
                        //get the extention of our image like (jph.png, etc) e.g "food1.jpj"
                        $ext = end(explode('.',$image_name));//split image name where is '.' and add last part e.g ak.jpg(stored jpg in variable)

                        //rename image name
                        $image_name = "Food_Category_".rand(000,999).'.'.$ext;//e.g Food_Category_245.jpg

                        // [tmp_name] => C:\xampp\tmp\phpB78A.tmp
                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        //? finally upload new image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload == false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                            //redirect to add category page
                            header('location:'.SITEURL.'admin/manage-category.php');
                            //stop the process
                            die();
                        }

                        //todo:B. Remove the current image
                        if($current_image != "")
                        {
                            $remove_path = "../images/category/".$current_image;
                            $remove = unlink($remove_path);
    
                            //check whether the image remove or not
                            //if failed to remove display message and stop the process
                            if($remove == false)
                            {
                                //failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                                die();//stop the process
                            }
                        }
                        
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }
                //3. Update the database
                $sql2 = "UPDATE tbl_category
                    SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id = $id
                ";

                //Execute the query
                $res2 = mysqli_query($conn, $sql2);

                //4. redirect to manage category with message
                //check whather Query executed or not
                if($res2)
                {
                    //category updated
                    $_SESSION['update'] = "<div class='success'>Category Updated Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');

                }
                else
                {
                    //failed to update category
                    $_SESSION['update'] = "<div class='error'>Failed to Update Category</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }

                // ?................................................................................................
            }
        
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>