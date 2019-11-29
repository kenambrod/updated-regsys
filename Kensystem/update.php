<?php
include 'config.php';
$name = $price = $description = $image = '';
if(isset($_POST['btnUpdate'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image= $_POST['image'];

    echo "$id<br>";
    echo "$name<br>";
    echo "$price<br>";
    echo "$description<br>";
    echo "$image<br>";
}
?>
