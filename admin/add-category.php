<?php include('partials/menue.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php
            //if failed to add
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            //if failed to upload image
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>

        <br><br>
        <!-- Add Category form start -->

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select_Image </td>
                    <td>
                        <input type="file" name=image>
                    </td>
                </tr>
                
                <tr>
                    <td>Featured  </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active  </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <!-- Add Category form end -->

        <?php
        
        //check whether the submit button is clicked or not
        if(isset($_POST['submit']))
        {
            // echo "clicked";

            //1. get the value from category from
            $title = $_POST['title'];

            //for radio input, we need to check whether the button is selected or not
            if(isset($_POST['featured']))
            {
                //get the value from form
                $featured = $_POST['featured'];
            }
            else
            {
                //set the default value
                $featured = "No";
            }

            if(isset($_POST['active']))
            {
                //get the value from form
                $active = $_POST['active'];
            }
            else
            {
                //set the default value
                $active = "No";
            }

            //check whether the image is selected or not and set the vaule for image name accordingly
            // print_r($_FILES['image']);

            // die(); //break the code here
            
            //? check image selected or not /time:34 video:5
            /*some times when we click coose file $_FILES value became set
            but if we not set any image variable name became empty that's why we need check that it is empty or not*/
            
            // Array ( [name] => Food_Category_929.jpg)
            if(isset($_FILES['image']['name'])) 
            {
                //upload the image
                //?to upload image we need image_name, source path and destination path
                
                // [name] => Food_Category_929.jpg
                $image_name = $_FILES['image']['name'];

                //todo: upload the image only if image is selected
                
                if($image_name != "") 
                {
                    //auto rename  our image
                    //get the extention of our image like (jph.png, etc) e.g "food1.jpj"
                    $ext = end(explode('.',$image_name));//split image name where is '.' and add last part e.g ak.jpg(stored jpg in variable)

                    //rename image name
                    $image_name = "Food_Category_".rand(000,999).'.'.$ext;//e.g Food_Category_245.jpg

                    // [tmp_name] => C:\xampp\tmp\phpB78A.tmp
                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/".$image_name;

                    //todo: finally upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether the image is uploaded or not
                    //And if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload == false)
                    {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                        //redirect to add category page
                        header('location:'.SITEURL.'admin/add-category.php');
                        //stop the process
                        die();
                    }
                }
            }
            else
            {
                //dont upload image and set the image name value as blank
                $image_name = "";
            }

            //2. create sql query to insetr category into database
            $sql = "INSERT INTO tbl_category SET
                title = '$title',
                image_name= '$image_name',
                featured = '$featured',
                active = '$active'
            ";

            //3. Execute the query and save the database
            $res = mysqli_query($conn, $sql);

            //4. Check whetehr the query is executed or not
            if($res)
            {
                //Executed successfully and category added
                $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                //redirect ot manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else
            {
                //Failed to Executed and not added
                $_SESSION['add'] = "<div class='error'>Failed To Add Category.</div>";
                //redirect ot manage category page
                header('location:'.SITEURL.'admin/add-category.php');
            }
        }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php') ?>