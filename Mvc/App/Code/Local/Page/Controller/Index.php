<?php

class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")->addjs("navigation.js");
        $layout->getChild("head")->addjs("page.js");
        $layout->getChild("head")->addcss("productForm.css");
        $layout->getChild("head")->addcss("page.css");
        $banner  = $layout->createBlock("core/template")
                    ->setTemplate("banner/banner.phtml");
        $layout->getChild("content")
                    ->addChild('banner',$banner)
                    ->addChild('banner1',$banner);
                    
        $layout->toHtml();
    }
}