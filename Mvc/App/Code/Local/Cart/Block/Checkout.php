<?php

class Cart_Block_Checkout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/checkout.phtml');
    }
    public function getAddress(){
       $id =  Mage::getSingleton('core/session')->get('quote_customer_id'); 
    //    $id = "1";
       $list =  Mage::getSingleton("sales/quote_customer")->getCollection()->addFieldToFilter("quote_customer_id",$id);
       return $list->getData();
    }
    public function getCustomerId(){
        return Mage::getSingleton('core/session')->get('logged_in_customer_user_id');
    }
    public function getCustomerEmails(){
        $id =  Mage::getSingleton('core/session')->get('logged_in_customer_user_id');
        $list =  Mage::getModel("customer/customer")->getCollection()->addFieldToFilter("customer_id",$id);
        return $list->getData();
    }
    public function getQuoteId(){
        return Mage::getSingleton('core/session')->get('quote_id');
    }
    public function getCustomerAllAddress()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_user_id');
        $customerAddressModel = Mage::getModel('customer/address');
        return $customerAddressModel->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->getData();
    }
    public function getCustomerFirstAddress()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_user_id');
        $customerAddressModel = Mage::getModel('customer/address');
        $customerFirstAddress = $customerAddressModel->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->getFirstItem();
        return $customerFirstAddress ? $customerFirstAddress : $customerAddressModel;
    }
    public function getCustomerEmail()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_user_id');
        $customerModel = Mage::getModel('customer/customer');
        return $customerModel->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->getFirstItem()
            ->getCustomerEmail();
    }
    public function getPaymentMethods()
    {
        return [
            'card' => 'Credit or Debit Card',
            'digital_wallet' => 'Digital Wallet',
            'upi' => 'UPI',
            'net_banking' => 'Net Banking',
            'cod' => 'Cash On Delivery'
        ];
    }
    public function getShippingMethods()
    {
        return [
            'normal_day' => 'Normal Day Shipping',
            'same_day' => 'Same Day Shipping',
            'international' => 'International Shipping'
        ];
    }
}
