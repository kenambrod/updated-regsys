<?php
include 'header.php';
include  'config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
//    selecting product using an id n the DB
    $sql = "SELECT `id`, `name`, `price`, `description`, `image` FROM `product` WHERE id='$id'  ";
    $found_product = mysqli_query($conn, $sql) or die ($id);
    $row = mysqli_fetch_assoc($found_product);

    $name = $row['name'];
    $price = $row['price'];
    $description = $row['description'];
    $image= 'images/'.$row['image'];


}
?>
<div class="container">
  <div class="row">
      <div class="col col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <img src="<?php echo $image?>" alt="">
      </div>
      <div class="col col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <form action="update.php"
                method="post" enctype="multipart/form-data">
              <input type="number" name="id" value="<?php echo $id?>" hidden>
              <input type="text" name="image" value="<?php echo $image?>" hidden>

              <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="name" class="form-control"
                         value="<?php echo $name?>">
              </div>

              <div class="form-group">
                  <label for="">Price</label>
                  <input type="text" name="price" class="form-control"
                         value="<?php echo $price?>">
              </div>

              <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" name="description" class="form-control"
                         value="<?php echo $description?>">
              </div>
              <div class="form-group">
                  <input type="file" name="updateImg">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-info btn-lg" name="btnUpdate">Update</button>
                  <a href="#" class="btn btn-danger btn-lg">Delete</a>
              </div>
          </form>
      </div>
  </div>
</div>



<?php include 'footer.php'?>