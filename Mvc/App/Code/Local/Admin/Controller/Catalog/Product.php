<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Admin_Action
{
    protected $_allowedAction = [];
    public function includefile($newfile)
    {
        $newfile->addCss("catalog/admin/product/productForm.css");
        $newfile->addCss("catalog/admin/product/list.css");
    }
    public function formAction()
    {
        $layout = $this->getLayout();
        $newfile =  $layout->getChild("head");
        $this->includefile($newfile);
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product_form');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getparams("Catalog_product");
        if (isset($_POST['submit'])) {
            $imageName2 = $_FILES['image_link']['name'];
            $tmp_name = $_FILES['image_link']['tmp_name'];
            $folder = "media/product/" . $imageName2;
            move_uploaded_file($tmp_name,$folder);
        }
        $data['image_link'] = $imageName2;
        $product = Mage::getModel("catalog/product")
        ->setData($data);
        $product->save();
        $location = Mage::getBaseUrl("admin/catalog_product/list");
        header("Location: $location");
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getparams("id");
        $product = Mage::getModel("catalog/product")->load($id);
        $product->delete();
        $location = Mage::getBaseUrl("admin/catalog_product/list");
        header("Location: $location");
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $newfile =  $layout->getChild("head");
        $this->includefile($newfile);
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product_list');
        $child->addChild('list', $productForm);
        $layout->toHtml();
    }
}