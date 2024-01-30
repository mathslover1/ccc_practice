<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories List</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Your existing PHP code for database connection and category form handling -->

<!-- Display Categories -->
<div class="container mt-4">
    <h2>Categories</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect("localhost","root","","ccc_practice");
            $selectCategorySql = "SELECT * FROM ccc_category";
            $resultCategory = mysqli_query($conn, $selectCategorySql);
           
            while ($rowCategory = mysqli_fetch_assoc($resultCategory)) {
                echo "<tr>
                <td>{$rowCategory['cat_id']}</td>
                <td>{$rowCategory['name']}</td> 
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
