<?php
class Admin_Controller_Order extends Core_Controller_Admin_Action
{
    public function indexAction()
    {
        $check = $this->getRequest()->isPost();
        if ($check) {
            $status = $this->getRequest()->getParams('order_status');
            Mage::getModel('sales/order_status')->setData($status)->save();
            Mage::getModel('sales/order')
            ->setData($status)
            ->removeData('action_by')
            ->removeData('from_status')
            ->save();
            $this->setRedirect('admin/order');
        } else {    
            $layout = $this->getLayout();
            $layout->getChild("head")->addCss('admin/order.css');
            $order = $layout->createBlock("admin/order");
            $layout->getChild("content")
                ->addChild('order', $order);
            $layout->toHtml();
        }
    }
    public function viewAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss('admin/order.css');
        $order = $layout->createBlock("admin/orderView");
        $layout->getChild("content")
            ->addChild('view', $order);
        $layout->toHtml();
    }
    public function addressAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss('admin/order.css');
        $order = $layout->createBlock("admin/address");
        $layout->getChild("content")
            ->addChild('address', $order);
        $layout->toHtml();
    }
    public function cancelAction()
    {
        $check = $this->getRequest()->isPost();
        if ($check) {
            $status = $this->getRequest()->getParams('cancel');
            $orderId =  Mage::getModel('sales/order_status')->adminCancelOrderStatus($status);
            Mage::getModel('sales/order')
            ->addData('order_id',$orderId)
            ->addData('to_status','cancelled')
            ->save();
            
            $this->setRedirect('admin/order');
        } else {
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss('admin/order.css');
        $order = $layout->createBlock("admin/cancel");
        $layout->getChild("content")
            ->addChild('cancel', $order);
        $layout->toHtml();
        }
    }
}
