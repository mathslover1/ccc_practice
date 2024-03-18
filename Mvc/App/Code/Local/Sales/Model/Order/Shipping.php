<?php

class Sales_Model_Order_Shipping extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Shipping';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Shipping';
        $this->_modelClass = 'sales/order_shipping';
    }
    public function addOrderShippingData( $orderData, $orderId)
    {
        $this
        ->setData($orderData->getData())
        ->removeData('shipping_id')
        ->removeData('quote_id')
        ->addData('order_id', $orderId)
        ->save();
        return $this->getId();
    }
}
?>