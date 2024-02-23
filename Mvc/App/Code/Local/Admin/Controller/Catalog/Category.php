<?php
class Admin_Controller_Catalog_Category extends Core_Controller_Front_Action
{
    public function includefile($newfile)
    {
        $newfile->addCss("category/form.css");
    }
    public function formAction()
    {
        $layout = $this->getLayout();
        $newfile =  $layout->getChild("head");
        $this->includefile($newfile);
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('Catalog/admin_category_form');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
}
?>