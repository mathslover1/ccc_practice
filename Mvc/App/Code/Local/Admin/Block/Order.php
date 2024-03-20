<?php

class Admin_Block_Order extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("admin/order.phtml");
    }
    public function getCustomerOrder()
    {
        return Mage::getModel('sales/order')
            ->getCollection()
            ->addOrderBy('order_id')
            ->addCondition('DESC')
            ->getData();
    }
    public function getStatusData()
    {
        $data = ['pending','order_place','approved','shipped','cancelled','delivered','declined','refunded','complete'];
        return $data;
    }
}
