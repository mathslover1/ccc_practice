<?php

class Sales_Controller_Quote extends Core_Controller_Front_Action{
    public function addAction(){
        $request = Mage::getSingleton('core/request')->getParams('cart');
        // $request =  ['product_id' =>4, 'qty' =>5];
        $quote = Mage::getSingleton('sales/quote')->addProduct($request);
        $this->setRedirect('cart');
    }
        public function deleteAction(){
            $request =  ['quote_id' =>3, 'item_id' =>1];
        $quote = Mage::getSingleton('sales/quote')->deleteProduct($request);
    }
    public function updateAction(){
        $request =  ['quote_id' =>4,'product_id' =>4, 'qty' =>10 , 'item_id' =>1];
        $quote = Mage::getSingleton('sales/quote')->updateProduct($request);
    }
}

?>