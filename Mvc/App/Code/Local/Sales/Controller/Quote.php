<?php

class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function addAction()
    {
        $request = Mage::getSingleton('core/request')->getParams('cart');
        Mage::getSingleton('sales/quote')->addProduct($request);
        $this->setRedirect('cart');
    }
    public function deleteAction()
    {
        $request = [
            'quote_id' => Mage::getSingleton('core/request')->getParams('quote_id'),
            'item_id' => Mage::getSingleton('core/request')->getParams('item_id')
        ];
        $quote = Mage::getSingleton('sales/quote')->deleteProduct($request);
        $this->setRedirect('cart');
    }
}
