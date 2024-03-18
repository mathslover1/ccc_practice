<?php

class Customer_Controller_Order extends Core_Controller_Front_Action {
    public function indexAction(){
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss('customer/order.css');
        $child = $layout->getChild('content');
        $order = $layout->createBlock('customer/order');
        $child->addChild('order', $order);
        $layout->toHtml();
    }
}

?>