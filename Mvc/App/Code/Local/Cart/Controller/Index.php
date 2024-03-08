<?php

class Cart_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction(){
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss("cart/cart.css");
        $layout->getChild("head")->addCss("page.css");
        $banner  = $layout->createBlock("cart/cart");
        $layout->getChild("content")
                    ->addChild('cart',$banner);
        $layout->toHtml();
    }
}


?>