<?php

class Bank_Block_Form extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('bank/form.phtml');
    }
    public function getItemList()
    {
        $quoteId = Mage::getSingleton("core/session")->get("quote_id");
        return Mage::getModel('sales/quote_item')
        ->getCollection()
        ->addFieldToFilter('quote_id',$quoteId);
    }
    public function getItem($id)
    {   
        return $this->getItemList()->addFieldToFilter('item_id',$id);
    }
    public function getBankList()
    {
        
    }
}