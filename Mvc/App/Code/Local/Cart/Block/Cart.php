<?php

class Cart_Block_Cart extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/cart.phtml');
    }
    public function getItemList()
    {
        // echo "<pre>";
        // $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_user_id');
        $quoteId = Mage::getSingleton("core/session")->get("quote_id");
        return Mage::getModel('sales/quote_item')
        ->getCollection()
        ->addFieldToFilter('quote_id',$quoteId);
        // foreach($cartData->getData() as $a){
        // }
        
        // if($customerId){
        //     $quoteId = Mage::getSingleton("core/session")->get("quote_id");
        //     $cartOldData = Mage::getModel('sales/quote_item')
        //     ->getCollection()
        //     ->addFieldToFilter('quote_id',$quoteId)
        //     ->addFieldToFilter('customer_id',$customerId);
        // }
        // foreach($cartOldData->getData() as $b){
        // }
        // print_r((array)$a);
        // print_r((array)$b);die;
        // return $cartData;    
    }
    // public function getItem($id)
    // {   
    //     return $this->getItemList()->addFieldToFilter('item_id',$id);
    // }
    public function getProductList()
    {
        
        return Mage::getModel('catalog/product')->getCollection();
    }
}