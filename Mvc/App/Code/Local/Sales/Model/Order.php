<?php

class Sales_Model_Order extends Core_Model_Abstract
{
    const INITIAL_ORDER_NUMBER = 1000000;
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order';
        $this->_modelClass = 'sales/order';
    }
    public function _beforeSave()
    {
        if (empty ($this->getId())) {
            $orderItem = $this->getCollection()
                ->addOrderBy('order_number', 'DESC')
                ->getFirstItem();
            if (is_null($orderItem)) {
                $this->addData('order_number', self::INITIAL_ORDER_NUMBER);
            } else {
                $this->addData('order_number', (int) $orderItem->getOrderNumber() + 1);
            }
        }
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
