<?php

class Admin_Block_Order extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("admin/order.phtml");
    }
    public function getCustomerOrder(){
       return Mage::getModel('sales/order')
        ->getCollection()
        ->addOrderBy('order_id')
        ->addCondition('DESC')
        ->getData();
    }
    public function getOrderItem($orderId){
        return Mage::getModel('sales/order_item')->getCollection()->addFieldToFilter('order_id',$orderId)->getData();
    }
    public function getProductItem($productId){
        return Mage::getModel("catalog/product")->getCollection()->addFieldToFilter('product_id',$productId)->getData();
    }
}
