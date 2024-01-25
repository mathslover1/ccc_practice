<?php
include("php_function.php");
include("mysql_function.php");
$conn = mysqli_connect("localhost","root","","ccc_practice");

$data=getPostData("ccc_product");

$sql=insert("ccc_product",$data);
// $sql="INSERT INTO `ccc_product` (`product_name`, `sku`, `product_type`, `category`, `manufacturer_cost`, `shipping_cost`, `total_cost`, `price`, `status`)
// VALUES ('$product_name', '$sku', '$product_type', '$category', '$manufacturer_cost','$shipping_cost','$total_cost','$price','$status')";
$insert=mysqli_query($conn,$sql);
if($insert){
    echo "<script>alert('Data add successfully')</script>";
    echo "<script>location. href='php_w2.php'</script>";
}else {
    echo "error";
}
?>