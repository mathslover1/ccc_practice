<?php

class Customer_Block_OrderView extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("Customer/orderView.phtml");
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
    public function getOrderItem($orderId){
        return Mage::getModel('sales/order_item')->getCollection()->addFieldToFilter('order_id',$orderId)->getData();
    }
    public function getProductItem($productId){
        return Mage::getModel("catalog/product")->getCollection()->addFieldToFilter('product_id',$productId)->getData();
    }
}
