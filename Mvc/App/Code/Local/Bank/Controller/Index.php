<?php

class Bank_Controller_Index extends Core_Controller_Front_Action
{
    public function formAction(){
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss("cart/cart.css");
        $layout->getChild("head")->addCss("page.css");
        $banner  = $layout->createBlock("bank/form");
        $layout->getChild("content")
                    ->addChild('form',$banner);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getparams("bank");
        $product = Mage::getModel("bank/bank")
            ->setData($data);
        $product->save();
    }
}


?>