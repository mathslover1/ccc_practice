<?php

class Sales_Model_Order_Status extends Core_Model_Abstract
{
    const customer_status = 'cancelled';
    const customer_action = 'customer'; 
    const customer_request = '1'; 
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Status';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Status';
        $this->_modelClass = 'sales/order_status';
    }
    public function cancelOrderStatus( $statusData, $orderData){
        $this->setData($statusData)
        ->addData('from_status',$orderData->getToStatus())
        ->addData('to_status',self::customer_status)
        ->addData('action_by',self::customer_action)
        ->addData('request',self::customer_request)
        ->save();

    }
    public function adminCancelOrderStatus( $statusData){
        $orderId = $this->load($statusData['history_id'])->getOrderId();
        $this->setData($statusData)
        ->addData('to_status',self::customer_status)
        ->addData('request','')
        ->addData('order_id',$orderId)
        ->save();
        return $this->getOrderId();
    }
}
?>