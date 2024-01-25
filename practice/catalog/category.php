<!-- Category Form -->
<h2>Add Category</h2>
<?php

if (isset($_GET['id'])) {   
    ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "ccc_practice";
$connection = mysqli_connect($server, $username, $password, $database);
include("../php_function.php");
$id=getGetData("id");
$query="SELECT * FROM `ccc_category` WHERE `cat_id`=$id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
    ?>
    <label for="categoryName">Category Name:</label>
    <input type="text" id="name" name="name" value="<?php  echo $row['name']; ?> " required>
    <input type="submit" value="Add Category">
    <?php
if (isset($_POST['submit'])){
include("mysql_function.php");
$conn = mysqli_connect("localhost","root","","ccc_practice");
$data=getPostData("ccc_category");
$sql=update("ccc_category",$data,["cat_id"=>$id]);
$insert=mysqli_query($conn,$sql);
if($insert){
    echo "<script>alert('Data update successfully')</script>";
    echo "<script>location. href='categorylist.php'</script>";
}else {
    echo "error";
}
}
?>
</form>

<?php
}
else {
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="categoryName">Category Name:</label>
    <input type="text" id="name" name="name" required>
    <input type="submit" value="Add Category">
</form>

<?php
$conn = mysqli_connect("localhost","root","","ccc_practice");

// Handle Category Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])) {
    $name = $_POST["name"];

    // Perform validation if needed

    // Insert the category into the database
    $insertCategorySql = "INSERT INTO ccc_category (name) VALUES ('$name')";
    
    if (mysqli_query($conn, $insertCategorySql)) {
        echo "<script>alert('Category added successfully')</script>";
        echo "<script>location. href='category_list.php'</script>";

    } else {
        echo "Error adding category: " . mysqli_error($conn);
    }
}

}

?>