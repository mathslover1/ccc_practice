<?php

class Customer_Controller_Order extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $check = $this->getRequest()->isPost();
        if ($check) {
            $status = $this->getRequest()->getParams('order_status');
            $orderData = Mage::getModel('sales/order')->load($status['order_id']);
             Mage::getModel('sales/order_status')->cancelOrderStatus($status, $orderData);
            $this->setRedirect('customer/order');
        } else {
            $layout = $this->getLayout();
            $layout->getChild("head")->addCss('customer/order.css');
            $child = $layout->getChild('content');
            $order = $layout->createBlock('customer/order');
            $child->addChild('order', $order);
            $layout->toHtml();
        }
    }
    public function viewAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss('customer/order.css');
        $child = $layout->getChild('content');
        $order = $layout->createBlock('customer/orderView');
        $child->addChild('view', $order);
        $layout->toHtml();
    }
    public function addressAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss('customer/order.css');
        $child = $layout->getChild('content');
        $order = $layout->createBlock('customer/address');
        $child->addChild('address', $order);
        $layout->toHtml();
    }
}
