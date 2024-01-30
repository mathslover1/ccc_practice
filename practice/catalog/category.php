<!-- Category Form -->
<h2>Add Category</h2>
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

?>