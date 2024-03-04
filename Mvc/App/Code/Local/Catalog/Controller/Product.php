<?php 

class Catalog_Controller_Product extends Core_Controller_Front_Action {
    public function includefile($newfile)
    {
        $newfile->addCss("category/form.css");
        $newfile->addCss("category/list.css");
    }
    public function viewAction()
    {
        $layout = $this->getLayout();
        $newfile =  $layout->getChild("head");
        $this->includefile($newfile);
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/product_view');
        $child->addChild('view', $productForm);
        $layout->toHtml();
    }
}

?>