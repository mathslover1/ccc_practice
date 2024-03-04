<?php 

class Catalog_Controller_Category extends Core_Controller_Front_Action {
    public function includefile($newfile)
    {
        $newfile->addCss("catalog/category/view.css");
    }
    public function viewAction()
    {
        $layout = $this->getLayout();
        $newfile =  $layout->getChild("head");
        $this->includefile($newfile);
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/category_view');
        $child->addChild('view', $productForm);
        $layout->toHtml();
    }

}

?>