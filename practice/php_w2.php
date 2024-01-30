<?php
require("catalog\sql\connection.php");
require("php_function.php");
$connection = mysqlConnection();
$query1 = "SELECT * FROM `ccc_category`";
$result1 = mysqli_query($connection, $query1);
if (isset($_GET['id'])) {
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
            <?php
            $id = getGetData("id");
            $query = "SELECT * FROM `ccc_product` WHERE `product_id`=$id";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($result);
            ?>
            <div class="box">
                <div class="container">
                    <div class="top"></div>
                    <div class="input-field">
                        <input type="text" class="input" name="ccc_product[product_name]" value="<?php echo $row['product_name']; ?> " placeholder="<?php echo $row['product_name']; ?>" id="product_name" required pattern="[a-zA-Z'-'\s]*">
                        <i class='bx bx-user'></i>
                    </div>

                    <div class="input-field">
                        <input type="text" class="input" name="ccc_product[sku]" value=" <?php echo $row['sku'] ?>" placeholder="<?php echo $row['sku'] ?>" id="sku" required pattern="[a-zA-Z'-'\s]*">
                        <i class='bx bx-user'></i>
                    </div>
                    <br>
                    <div class="input-field">
                        <label name="ccc_product[product_type]">Product Type</label>
                        <div class="radio-group">
                            <input type="radio" id="simple" name="ccc_product[product_type]" value="simple" checked>
                            <label for="simple">Simple</label>
                            <input type="radio" id="bundle" name="ccc_product[product_type]" value="bundle">
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
                        <input type="text" class="input" name="ccc_product[manufacturer_cost]" value=" <?php echo $row['manufacturer_cost']; ?>" placeholder="<?php echo $row['manufacturer_cost']; ?>" id="manufacturer_cost">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" name="ccc_product[shipping_cost]" value="<?php echo $row['shipping_cost']; ?> " placeholder="<?php echo $row['shipping_cost']; ?>" id="shipping_cost">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" name="ccc_product[total_cost]" value="<?php echo $row['total_cost']; ?> " placeholder="<?php echo $row['total_cost']; ?>" id="total_cost">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" name="ccc_product[price]" value="<?php echo $row['price']; ?> " placeholder="<?php echo $row['price']; ?>" id="price">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-field">
                        <label for="status">Status:</label>
                        <select id="status" name="ccc_product[status]" class="input">
                            <option value="enabled">Enabled</option>
                            <option value="disabled">Disabled</option>
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
    <?php
    if (isset($_POST['submit'])) {
        include("mysql_function.php");
        $conn = mysqli_connect("localhost", "root", "", "ccc_practice");

        $data = getPostData("ccc_product");

        $sql = update("ccc_product", $data, ["product_id" => $id]);
        $insert = mysqli_query($conn, $sql);

        if ($insert) {
            echo "<script>alert('Data update successfully')</script>";
            echo "<script>location. href='catalog/product_list.php'</script>";
        } else {
            echo "error";
        }
    }
    ?>
<?php
} else {
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
        <form action="phpw2_backend.php" method="post">
            <div class="box">
                <div class="container">
                    <div class="top"></div>
                    <div class="input-field">
                        <input type="text" class="input" name="ccc_product[product_name]" value=" " placeholder="Product Name" id="product_name" required pattern="[a-zA-Z'-'\s]*">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" name="ccc_product[sku]" value=" " placeholder="SKU" id="sku" required pattern="[a-zA-Z'-'\s]*">
                        <i class='bx bx-user'></i>
                    </div>
                    <br>
                    <div class="input-field">
                        <label name="ccc_product[product_type]">Product Type</label>
                        <div class="radio-group">
                            <input type="radio" id="simple" name="ccc_product[product_type]" value="simple" checked>
                            <label for="simple">Simple</label>
                            <input type="radio" id="bundle" name="ccc_product[product_type]" value="bundle">
                            <label for="bundle">Bundle</label>
                        </div>
                    </div>
                    <br>
                    <div class="input-field">
                        <label for="category">Category:</label>
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
                        <input type="text" class="input" name="ccc_product[manufacturer_cost]" value=" " placeholder="Manufacturer Cost" id="manufacturer_cost">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" name="ccc_product[shipping_cost]" value=" " placeholder="Shipping Cost" id="shipping_cost">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" name="ccc_product[total_cost]" value=" " placeholder="Total Cost" id="total_cost">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input" name="ccc_product[price]" value=" " placeholder="Price" id="price">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-field">
                        <label for="status">Status:</label>
                        <select id="status" name="ccc_product[status]" class="input">
                            <option value="enabled">Enabled</option>
                            <option value="disabled">Disabled</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-field">
                        <input type="submit" class="submit" value="Submit" id="submit" name="submit">
                    </div>
                </div>
            </div>
        </form>
    </body>

    </html>
<?php
}
?>