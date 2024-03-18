<?php

class Cart_Block_Complete extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/complete.phtml');
    }
    public function getOrderData()
    {
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_user_id');
        $data = Mage::getModel('sales/order')
            ->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->addGroupBy('order_id')
            ->addCondition('DESC')
            ->getFirstItem();
        return $data->getData();
    }
    public function getProductData()
    {
        $data = Mage::getModel('sales/order_item')->getCollection()->addFieldToFilter('order_id', $this->getOrderData()['order_id']);   
        return $data->getData();
    }
}
