<?php

class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")->addjs("js/navigation.js");
        $layout->getChild("head")->addjs("js/page.js");
        $layout->getChild("head")->addcss("css/navigation.css");
        $layout->getChild("head")->addcss("css/page.css");
        $layout->toHtml();
        // print_r($layout);
    }
}