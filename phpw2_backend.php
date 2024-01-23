<?php

$conn = mysqli_connect("localhost","root","","ccc_practice");

$product_name=$_POST["product_name"];
$sku=$_POST["sku"];
$product_type=$_POST["product_type"];
$category=$_POST["category"];
$manufacturer_cost=$_POST["manufacturer_cost"];
$shipping_cost=$_POST["shipping_cost"];
$total_cost=$_POST["total_cost"];
$price=$_POST["price"];
$status=$_POST["status"];

$sql="INSERT INTO `ccc_product` (`product_name`, `sku`, `product_type`, `category`, `manufacturer_cost`, `shipping_cost`, `total_cost`, `price`, `status`)
VALUES ('$product_name', '$sku', '$product_type', '$category', '$manufacturer_cost','$shipping_cost','$total_cost','$price','$status')";
$insert=mysqli_query($conn,$sql);
if($insert){
    echo "<script>alert('Data add successfully')</script>";
    echo "<script>location. href='php_w2.php'</script>";
}else {
    echo "error";
}
?>