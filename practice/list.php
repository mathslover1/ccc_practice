<html>
    <body>
        <?php 
    $conn = mysqli_connect("localhost","root","","ccc_practice");
    $query = "SELECT * from `ccc_product` ORDER BY `product_id` LIMIT 10";
    $res = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <div>
        <ul>
           <?php
           foreach($row as $x){
            ?>
            <li> <?php
                echo $x;
                ?>
                </li>
                <?php
           } 
    }
           ?>
           </ul>
        </div>
    </body>
</html>