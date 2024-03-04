<?php

class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss("productForm.css");
        $layout->getChild("head")->addCss("page.css");
        $banner  = $layout->createBlock("banner/addBanner");
        $layout->getChild("content")
                    ->addChild('banner',$banner)
                    ->addChild('banner1',$banner);
        $layout->toHtml();
    }
}