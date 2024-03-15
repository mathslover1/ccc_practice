<?php

class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function addAction()
    {
        $request = Mage::getSingleton('core/request')->getParams('cart');
        $this->checkDataAndRedirect(['catalog/product/view' => $request ]);  
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
    public function addressAction(){
        $quoteId = Mage::getSingleton('core/session')->get("quote_id");
        $addressData = Mage::getSingleton('core/request')->getParams('customer_address');
        $this->checkDataAndRedirect(['cart' =>$quoteId,'cart/checkout/form' => $addressData]);
         Mage::getSingleton('sales/quote')->addAddress($addressData);
            $this->setRedirect('cart/checkout/form');
    }
    public function placeOrderAction()
    {
        $PaymentData = Mage::getSingleton('core/request')
        ->getParams('quote_payment_method');
        $ShippingData = Mage::getSingleton('core/request')
        ->getParams('quote_shipping_method');
        
        Mage::getSingleton('sales/quote')->addPayment($PaymentData);
        Mage::getSingleton('sales/quote')->addShipping($ShippingData);

        Mage::getSingleton('sales/quote')->convert();
             Mage::getSingleton('core/session')->remove('quote_id');
        $this->setRedirect('');
    }
}
