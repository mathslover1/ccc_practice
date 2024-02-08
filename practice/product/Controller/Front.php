<?php 

class Controller_Front{
    public function init()
    {
        $request_uri = new Model_Request();
        $request_uri =  $request_uri->getrequestUri();
        $request_uri = str_replace("/Internship/practice/product","", $request_uri);
        $request_uri = 'view'.$request_uri;
        $request_uri =  str_replace("/","_", $request_uri);
        $layout = new $request_uri();
        echo $layout->toHTML();
    
    $request = new Model_Request();
        $action = $request->getparams('action');
        $id = $request->getparams('id');

        // Perform CRUD operations based on action
        switch ($action) {
            case 'add':
                if (!$request->isPost()) {
                    $productView = new View_Product();
                    echo $productView->toHtml();
                    
                } else {
                    $productModel = new Model_Product();
                    $result = $productModel->add($request->getParams('ccc_product'));
                    if ($result) {
                        echo "<script>alert('Data added successfully')</script>";
                        echo "<script>location.href='index.php'</script>";
                    } else {
                        echo "error";
                    }
                }
                break;
            case 'edit':
                if (!$request->isPost()) {
                    $productView = new View_Product();
                    echo $productView->toHtml();
                    echo "hey";
                } else {
                    $productModel = new Model_Product();
                    $result = $productModel->update($request->getParams('ccc_product'), ['product_id' => $id]);
                    if ($result) {
                        echo "<script>alert('Data updated successfully')</script>";
                        echo "<script>location.href='index.php'</script>";
                    } else {
                        echo "<script>alert('Error in data updating')</script>";
                    }
                }
                break;
            case 'delete':
                $productModel = new Model_Product();
                $result = $productModel->delete(['product_id' => $id]);
                if ($result) {
                    echo "<script>alert('Data deleted successfully')</script>";
                    echo "<script>location.href='index.php'</script>";
                } else {
                    echo "<script>alert('Error in data deleting')</script>";
                }
                break;
            default:
                break;
        }

        echo $layout->toHTML();
    }
}

?>