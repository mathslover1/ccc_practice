<?php

class Admin_Block_Address extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("admin/address.phtml");
    }
    public function getCustomerOrder(){
        $orderId = $this->getRequest()->getParams('id'); 
       return Mage::getModel('sales/order')
        ->getCollection()
        ->addFieldToFilter('order_id',$orderId)
        ->addOrderBy('order_id')
        ->addCondition('DESC')
        ->getData();
    }
    public function getOrderAddress($orderId){
        return Mage::getModel('sales/order_customer')->getCollection()->addFieldToFilter('order_id',$orderId)->getData();
    }
}
