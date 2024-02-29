<?php 

class Customer_Block_Dashboard extends Core_Block_Template {
    public function __construct(){
        $this->setTemplate('customer/account/dashboard.phtml');
    }
    public function getCustomer(){
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id'); 
        $list =  Mage::getModel("customer/customer")->getCollection()->addFieldToFilter("customer_id",$customerId);
        return $list->getData();
    }
}
?>