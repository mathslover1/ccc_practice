<?php
include 'Lib/autoload.php';

class ccc{
    public static function init () {
        $FrontController= new Controller_Front();
        $FrontController->init();

        $request = new Model_Request();
        $request=  $request->getrequestUri();
    }
}
ccc::init();

// $request = new Model_Request();
// $action=$request->getparams('action');
// $id= $request->getparams('id');

// if(!$request->isPost() && $action==null){
//     $product=new View_ProductList();
//     echo $product->toHtml(); 
// }

// if($action=='add'){
//     if(!$request->isPost()){
//         $product = new View_Product();
//         echo $product->toHtml();
//     }else{
//         $product = new Model_Product();
//         $result= $product->add($request->getParams('ccc_product'));
//         if($result){
//             echo "<script>alert('Data add successfully')</script>";
//             echo  "<script>location.href='index.php'</script>";
//         }else {
//             echo "error";
//         }
//     }
// }
// elseif($action=='edit'){
//     if(!$request->isPost()){
//         $product=new View_Product();
//         echo $product->toHtml();
//     }
//     else{
//         $product=new Model_Product();
//         $result=$product->update($request->getParams('ccc_product'),['product_id'=>$id]);
//         if($result){
//             echo "<script>alert('Data updated succefully')</script>";
//             echo "<script>location.href='index.php'</script>";
//         }
//         else{
//             echo "<script>alert('Error in data updating')</script>";
//         }
        
//     }
// }
// elseif($action=='delete'){
//     $product=new Model_Product();
//     $result=$product->delete(['product_id'=>$id]);
//     if($result){
//         echo "<script>alert('Data deleted succefully')</script>";
//         echo "<script>location.href='index.php'</script>";
//     }
//     else{
//         echo "<script>alert('Error in data deleting')</script>";
//     }        
// }

?>