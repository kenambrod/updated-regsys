<?php
include "config.php";
include "header.php";

$name = $price = $description =$image =$target_file='';
// Check if image file is a actual image or fake image
// code for uploading image goes here


if (isset($_POST["uploadbtn"])) {


    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    // Get image name
    $image = $_FILES['fileToUpload']['name'];
    // image file directory
    $target = "images/".basename($image);
    $sql = "INSERT INTO `product`(`id`, `name`, `price`, `description`, `image`) VALUES (NULL,'$name','$price','$description','$image')";
    mysqli_query($conn,$sql);

    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
        header('location:index.php?smsg='.$msg);
    }else{
        $msg = "Failed to upload image";
        header('location:product.php?smsg='.$msg);
    }



}
?>
<div class="container">
    <div class="row">
    <div class="col col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
    <div class="col col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <?php
                     if (isset($_GET['name_err']))
                     {
                         $error = $_GET['name_err'];
                         echo '<div class= "alert alert-danger">';
                         echo "<p>$error</p>";
                         echo '</div>';
                     }
                     ?>

                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter name" class="form-control">
            </div>

            <div class="form-group">
                <?php
                if (isset($_GET['price_err']))
                {
                    $error = $_GET['price_err'];
                    echo '<div class= "alert alert-danger">';
                    echo "<p>$error</p>";;
                    echo '</div>';
                }
                ?>
                <label for="price">Price</label>
                <input type="text" name="price" placeholder="Enter price" class="form-control">
            </div>

            <div class="form-group">
                <?php
                if (isset($_GET['description_err']))
                {
                    $error = $_GET['description_err'];
                    echo '<div class= "alert alert-danger">';
                    echo "<p>$error</p>";
                    echo '</div>';
                }
                ?>
                <label  for="description">Description</label>
                <textarea name="description" id="description" cols="60" rows="10" class="form-control"></textarea>
<!--                <input type="text" name="description" placeholder="Enter description" class="form-control">-->
            </div>
            <div class="form-group">
                <?php
                if (isset($_GET['image_err']))
                {
                    $error = $_GET['image_err'];
                    echo '<div class= "alert alert-danger">';
                    echo "<p>$error</p>";
                    echo '</div>';
                }
                ?>

<!--                <input type="file" name="image" value="Upload">-->
                <input type="file" name="fileToUpload" >
            </div>
            <div class="form-group">
                <input type="submit" name="uploadbtn" class="btn btn-info btn-block" value="Upload product">
            </div>
        </form>
    </div>
    <div class="col col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
    </div>
</div>

<?php include "footer.php"?>
