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
    public function includeFile($newfile)
    {
        $newfile->addCss("cart/checkout.css");
        $newfile->addJs("jquery-3.7.1.js");
    }
    public function formAction()
    {
        $layout = $this->getLayout();
        $newfile =  $layout->getChild("head");
        $this->includeFile($newfile);
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('cart/checkout');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
}


?>