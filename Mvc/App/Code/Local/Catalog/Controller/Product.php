<?php 

class Catalog_Controller_Product extends Core_Controller_Front_Action {
    protected $_allowedAction = [];
    public function includefile($newfile)
    {
        $newfile->addCss("category/form.css");
        $newfile->addCss("catalog/product/view.css");
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