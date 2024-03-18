<?php

class Sales_Model_Order extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order';
        $this->_modelClass = 'sales/order';
    }
    public function _beforeSave()
    {
        $orderNumber = rand(1000000, 9999999);

        $flag = True;
        while ($flag) {
            $existOrderNumber = Mage::getModel('sales/order')
                ->getCollection()
                ->addFieldToFilter('order_number', $orderNumber)
                ->getFirstItem();
            if (!$existOrderNumber) {
                $flag = False;
            }
            $orderNumber = rand(1000000, 9999999);
        }
        $this->addData('order_number', $orderNumber);
    }
    public function addOrder(Sales_Model_Quote $data)
    {
        $this->setData($data->getData())
            ->removeData('quote_id')
            ->removeData('payment_id')
            ->removeData('shipping_id')
            ->save();
        return $this->getId();
    }
    public function addPaymentShippingId($paymentId,$shippingId)
    {
        $this
        ->getData();
        $this->addData('payment_id', $paymentId)
        ->addData('shipping_id', $shippingId)
        ->save();
    }
}
