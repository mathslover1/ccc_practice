<?php
include("sql/functions.php");
$query1="SELECT * FROM `ccc_category`";
$result1 = mysqli_query($connection, $query1);

// if (isset($_GET['id'])) {
// $id=getGetData("id");

// $query =delete("ccc_product",['product_id'=>$id]);
// $res=mysqli_query($connection,$query);
// if($res){
//     echo "<script>alert('data delect successfully')</script>
//                 <script>location. href='product_list.php'</script>";
//     }else{
//     echo "<script>location. href='product_list.php'</script>";
// }
// }

$product_name = "";
$product_sku = "";
$product_type = "";
$product_category = "";
$manufacturer_cost = "";
$shipping_cost = "";
$total_cost = "";
$product_price = "";
$product_status = "";
$product_created_at = "";
$product_updated_at = "";
$button_text = "submit";

if (getParams('action') == 'update' && getParams('product_id')) {
    $single_product = whereBaseSelect('ccc_product', ['product_id' => getParams('product_id')]);
    if ($single_product && $single_product->num_rows > 0) {
        $single_product = $single_product->fetch_assoc();
        $product_name = $single_product['product_name'];
        $product_sku = $single_product['product_sku'];
        $product_type = $single_product['product_type'];
        $product_category = $single_product['cat_id'];
        $manufacturer_cost = $single_product['manufacturer_cost'];
        $shipping_cost = $single_product['shipping_cost'];
        $total_cost = $single_product['total_cost'];
        $product_price = $single_product['product_price'];
        $product_status = $single_product['product_status'];
        $product_created_at = $single_product['product_created_at'];
        $product_updated_at = $single_product['product_updated_at'];
        $button_text = 'update';
    } else {
        echo "<script>alert('Data not found')</script>";
    }
}

if (getParams('submit')) {
    $keys = getKeysFromPostRequest();
    for ($i = 0; $i < count($keys); $i++) {
        $insert_query = insert($keys[$i], getParams($keys[$i]));
        if ($insert_query){
            echo "<script>alert('Data submitted successfully')</script>";
        } else {
            echo "<script>alert('Data not submitted')</script>";
        }
    }
}
if (getParams('action') == 'delete' && getParams('product_id')) {
    $status = delete('ccc_product', ['product_id' => getParams('product_id')]);
    if ($status) {
        echo "<script>alert('Data deleted successfully')</script>";
        echo "<script>location. href='product_list.php'</script>";
    } else {
        echo "<script>alert('Data not deleted')</script>";
        echo "<script>location. href='product_list.php'</script>";
    }
}
if (getParams('update')) {  
    $keys = getKeysFromPostRequest();
    for ($i = 0; $i < count($keys); $i++) {
        $update_query = update($keys[$i], ['product_id' => getParams('product_id')], getParams($keys[$i]));
        if ($update_query) {
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>location. href='product_list.php'</script>";
        } else {
            echo "<script>alert('Data not updated')</script>";
            echo "<script>location. href='product_list.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Your Page Title</title>
</head>
<body>
    <form action="" method="post">
        <div class="box">
            <div class="container">
                <div class="top"></div>
                <div class="input-field">
                    <input type="text" class="input" name="ccc_product[product_name]" value="<?php echo $product_name ?>"   placeholder ="<?php  echo $row['product_name']; ?>" id="product_name" required pattern="[a-zA-Z'-'\s]*">
                    <i class='bx bx-user'></i>
                </div>

                <div class="input-field">
                    <input type="text" class="input" name="ccc_product[sku]" value="<?php echo $product_sku ?>"   placeholder ="<?php echo $row['sku'] ?>" id="sku" required pattern="[a-zA-Z'-'\s]*">
                    <i class='bx bx-user'></i>
                </div>
                <br>
                <div class="input-field">
                    <label name="ccc_product[product_type]">Product Type</label>
                    <div class="radio-group">
                        <input type="radio" id="simple" <?php echo $product_type == 'simple' ? 'checked' : '' ?> name="ccc_product[product_type]" value="simple">
                        <label for="simple">Simple</label>
                        <input type="radio" id="bundle" <?php echo $product_type == 'bundle' ? 'checked' : ''  ?> name="ccc_product[product_type]" value="bundle">
                        <label for="bundle">Bundle</label>
                    </div>
                </div>
                <br>
                <div class="input-field">
            <label for="product_category">Category:</label>
            <select name="ccc_product[cat_id]" id="product_category" class="input">
                <?php
                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = mysqli_fetch_array($result1)) {
                        $selected = $row1['cat_id'] == $product_category ? 'selected' : '';
                        echo "<option value='{$row1['cat_id']}'>{$row1['name']}</option>";
                    }   
                }
                ?>
            </select>
        </div>
                <br>
                <div class="input-field">
                    <input type="text" class="input" name="ccc_product[manufacturer_cost]" value="<?php echo $manufacturer_cost ?>"   placeholder ="<?php echo $row['manufacturer_cost']; ?>" id="manufacturer_cost">
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <input type="text" class="input" name="ccc_product[shipping_cost]" value="<?php echo $shipping_cost ?>"   placeholder ="<?php echo $row['shipping_cost']; ?>" id="shipping_cost">
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <input type="text" class="input" name="ccc_product[total_cost]" value="<?php echo $total_cost ?>"   placeholder ="<?php echo $row['total_cost'];?>" id="total_cost">
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <input type="text" class="input" name="ccc_product[price]" value="<?php echo $product_price ?>"   placeholder ="<?php echo $row['price']; ?>" id="price">
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <label for="status">Status:</label>
                    <select id="status" name="ccc_product[status]" class="input">
                        <option <?php echo $product_status == 'enabled' ? 'selected' : false; ?> value="enabled">Enabled</option>
                        <option <?php echo $product_status == 'disabled' ? 'selected' : false; ?> value="disabled">Disabled</option>
                    </select>
                </div>
                <br>
                <div class="input-field">
                    <input type="submit" class="submit" value="Update" id="submit" name="submit">
                </div>
            </div>
        </div>
    </form>
</body>
</html>
