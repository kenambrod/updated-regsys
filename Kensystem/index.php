<?php
include 'config.php';
include 'header.php';

?>
<div class="container">
    <?php
        $sql = "SELECT * FROM `product`";
        $products = mysqli_query($conn, $sql);
        if(mysqli_num_rows($products) > 0 ){
            echo "<div class='row'>";
                while($row = mysqli_fetch_array($products)){
//                    get data after each  while loop
                    $id = $row['id'];
                    $name = $row['name'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image= 'images/'.$row['image'];



                    echo "<div class='col col-sm-12 col-md-4 col-lg-4 col-xl-4'>";
                        echo "<div class='img-thumbnail shadow-lg p-1 mb-5 bg-white'>";
                            echo "<a href='product_detail.php?id=$id'>";
                                echo "<img src='$image' class='img-thumbnail'>";
                                echo "Name:".$name."<br>";
                                echo "Price".$price."<br>";
                                echo "Price".$id."<br>";
                            echo "</a>";
                        echo "</div>";
                    echo "</div>";





                }








            echo "</div>";
        }else{
            echo "No products in the databse";
        }
    ?>
</div>


<?php
include 'footer.php';

?>
