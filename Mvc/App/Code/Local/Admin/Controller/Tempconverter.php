<?php

class Admin_Controller_Tempconverter extends Core_Controller_Front_Action
{

    public function listAction(){
        $layout = $this->getLayout();
        $layout->removeChild('header')->removeChild('footer');
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('admin/tempList');
        $child->addChild('list', $productForm);
        $layout->toHtml();
    }
}
