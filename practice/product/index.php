<?php
include 'Lib/autoload.php';

class ccc{
    public static function init () {
        $FrontController= new Controller_Front();
        $FrontController->init();

        $request = new Model_Request();
        $request=  $request->getrequestURI();
    }
}
ccc::init();



// $request = new Model_Request();

// if(!$request->isPost()){
//     $product = new View_Product();
//     echo $product->toHtml();
// }else{
//     $product = new Model_Product();
// 	$result= $product->save($request->getParams('ccc_product'));
//     if($result){
// 		echo "<script>alert('Data add successfully')</scri>";
// 		echo "<script>location. href='index.php'</script>";
// 	}else {
// 		echo "error";
//     }
// }

?>