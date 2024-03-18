<?php 

class Customer_Block_Order extends Core_Block_Template {
    public function __construct(){
        $this->setTemplate('customer/order.phtml');
    }
    public function getCustomerOrder(){
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_user_id');
       return Mage::getModel('sales/order')
        ->getCollection()
        ->addFieldToFilter('customer_id', $customerId)
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

?>