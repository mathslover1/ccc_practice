<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public function includefile($newfile)
    {
        $newfile->addCss("product/productForm.css");
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
        $product = Mage::getModel("catalog/product")
            ->setData($data);
        $product->save();
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getparams("id");
        $product = Mage::getModel("catalog/product")->load($id);
        $product->delete();
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
