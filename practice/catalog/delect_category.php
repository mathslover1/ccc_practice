<?php
include("../php_function.php");
include("sql/functions.php");
if (isset($_GET['id'])) {
$id=getGetData("id");

$query =delete("ccc_category",['cat_id'=>$id]);
$res=mysqli_query($connection,$query);
if($res){
    echo "<script>alert('data delect successfully')</script>
                <script>location. href='category_list.php'</script>";
    }else{
    echo "<script>location. href='category_list.php'</script>";
}
}

?>