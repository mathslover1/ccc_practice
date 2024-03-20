<?php

class Sales_Model_Order_Status extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Status';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Status';
        $this->_modelClass = 'sales/order_status';
    }
    public function cancelOrderStatus( $statusData, $orderData){
        $this->setData($statusData)
        ->addData('from_status',$orderData->getToStatus())
        ->addData('to_status','cancelled')
        ->addData('action_by','customer')
        ->addData('request',1)
        ->save();

    }
}
?>