<?php

class Admin_Block_Cancel extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("admin/cancel.phtml");
    }
    public function getOrderCancelData()
    {
        return Mage::getModel('sales/order_status')
            ->getCollection()
            ->addFieldToFilter('request', 1)
            ->getData();
    }
    public function getOrderData($orderId)
    {
        return Mage::getModel('sales/order')
            ->getCollection()
            ->addFieldToFilter('order_id',$orderId)
            ->getData();
    }
}
