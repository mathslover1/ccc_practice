<?php
include 'Lib/autoload.php';

$request = new Model_Request();

if(!$request->isPost()){
    $product = new View_Product();
    echo $product->toHtml();
}else{
    $product = new Model_Product();
	$result= $product->save($request->getParams('ccc_product'));
    if($result){
		echo "<script>alert('Data add successfully')</script>";
		echo "<script>location. href='index.php'</script>";
	}else {
		echo "error";
    }
}
?>