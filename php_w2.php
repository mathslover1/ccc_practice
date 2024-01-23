
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <form action="regbackend.php" method="post"  enctype="multipart/form-data" onsubmit="return myfun()" >
   <div class="box">
    <div class="container">
        <div class="top">
        </div>
        <div class="input-field">
            <input type="text" class="input" name="product_name" placeholder="Product_name" id="product_name" required pattern="[a-zA-Z'-'\s]*">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="text" class="input" name="SKU" placeholder="SKU" id="SKU" required pattern="[a-zA-Z'-'\s]*">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
                    <label for="product_type">Product Type</label>
                    <div class="radio-group">
                        <input type="radio" id="simple" name="product_type" value="simple" checked>
                        <label for="simple">Simple</label>
                        <input type="radio" id="bundle" name="product_type" value="bundle">
                        <label for="bundle">Bundle</label>
                    </div>
                </div>

                <div class="input-field">
                    <label for="Category">Category:</label>
                    <select id="Category" name="Category" class="input">
                        <option value="bgr">Bar & Game Room</option>
                        <option value="bedroom">Bedroom</option>
                        <option value="decor">Decor</option>
                        <option value="dining_Kitchen">Dining & Kitchen</option>
                        <option value="lighting">Lighting</option>
                        <option value="living_room">Living Room</option>
                        <option value="mattresses">Mattresses</option>
                        <option value="office">Office</option>
                        <option value="outdoor">Outdoor</option>
                    </select>
                </div>

            <div class="input-field">
            <input type="text" class="input" name="manufacturer_cost" placeholder="Manufacturer Cost" id="manufacturer_cost">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="text" class="input" name="shipping_cost" placeholder=" Shipping Cost " id="shipping_cost">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="text" class="input" name="total_cost" placeholder=" Total Cost " id="total_cost">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="text" class="input" name="price" placeholder="Price" id="price">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="submit" class="submit" value="Submit" id="submit"name="submit">
        </div>

    </div>
</div>  
    </form>
</body>
</html>