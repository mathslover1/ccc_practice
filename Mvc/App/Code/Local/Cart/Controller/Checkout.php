<?php

class Cart_Controller_Checkout extends Core_Controller_Front_Action
{
    protected $_allowedAction  = [];
    public function init()
    {
        $this->getRequest()->getActionName();
        if (
            !in_array($this->getRequest()->getActionName(), $this->_allowedAction) &&
            !Mage::getSingleton('core/session')->get('logged_in_customer_user_id')
        ) {
            $this->setRedirect('customer/account/login');
        }
    }
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss("cart/checkout.css");
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('cart/checkout');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function paymentAction(){
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss("cart/checkout.css");
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('cart/payment');
        $child->addChild('payment', $productForm);
        $layout->toHtml();
    }
    public function completeAction(){
        $layout = $this->getLayout();
        $newfile =  $layout->getChild("head")->addCss("cart/complete.css");
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('cart/complete');
        $child->addChild('complete', $productForm);
        $layout->toHtml();
    }
}


?>