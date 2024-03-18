<?php

class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote';
        $this->_modelClass = 'sales/quote';
    }
    public function initQuote()
    {
        $session = Mage::getSingleton('core/session');
        $customerId = $session->get('logged_in_customer_user_id');
        $quoteId = $session->get('quote_id', 0);
        if (!$quoteId) {
            $quote = Mage::getModel('sales/quote')
                ->setData(['tax_percent' => 8, 'grand_total' => 0]);
            if ($customerId) {
                $existingCart = Mage::getModel('sales/quote')->getCollection()
                    ->addFieldToFilter('order_id', 0)
                    ->addFieldToFilter('customer_id', $customerId)
                    ->addOrderBy('quote_id')
                    ->addCondition('DESC')
                    ->getFirstItem();
                if ($existingCart) {
                    $quote->addData('quote_id', $existingCart->getId());
                }
                $quote->addData('customer_id', $customerId);
            }
            $quoteId =  $quote->save()->getId();
            $session
                ->set('quote_id', $quote->getId());
        } else {
            if ($customerId) {
                $quoteId = Mage::getModel('sales/quote')->load($quoteId)
                    ->addData('customer_id', $customerId)
                    ->save()
                    ->getId();
            }
        }
        $this->load($quoteId);
        return $this;
    }
    public function getItemCollection()
    {
        return Mage::getModel('sales/quote_item')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }
    public function getQuoteCustomerData()
    {
        return Mage::getModel('sales/quote_customer')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }
    public function getOrderPayment()
    {
        return Mage::getModel('sales/quote_payment')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }
    public function getOrderShipping()
    {
        return Mage::getModel('sales/quote_shipping')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }
    public function getList()
    {
        $list =  Mage::getModel("catalog/product")
        ->getCollection()
        // ->addFieldToFilter('product_id', $productId)
        ;
        return $list->getData();
    }
    public function getQtyData($productId){
        return Mage::getSingleton('sales/order_item')->getCollection()->addFieldToFilter('product_id', $productId)->getData();
    }
    public function getSalesItemData($productId)
    {
        $sales = Mage::getModel("sales/order_item")->getCollection()->addGroupBy('product_id')->addSum('qty', 'sum_qty')->addFieldToFilter('product_id', $productId);
        return $sales->getData();
    }
    protected function _beforeSave()
    {
        $grandTotal = 0;
        foreach ($this->getItemCollection()->getData() as $_item) {
            $grandTotal += $_item->getRowTotal();
        }
        if ($this->getTaxPercent()) {
            $tax = round($grandTotal / $this->getTaxPercent(), 2);
            $grandTotal = $grandTotal + $tax;
        }
        $this->addData('grand_total', $grandTotal);
    }

    public function addProduct($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_item")
                ->addItem(
                    $this,
                    $request['product_id'],
                    $request['qty'],
                    isset($request['item_id'])
                        ? $request['item_id'] : null
                );
        }
        $this->save();
    }
    public function deleteProduct($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_item")->deleteItem($request['quote_id'], $request['item_id']);
        }
        $this->save();
    }
    public function addAddress($addressData)
    {
        $this->initQuote();
        $quoteCustomerId = Mage::getSingleton('core/session')->get('quote_customer_id');
        $modelName = Mage::getModel('sales/quote_customer');
        $modelName->setData($addressData);
        if ($quoteCustomerId) {
            $modelName->addData('quote_customer_id', $quoteCustomerId)
                ->save();
        } else {
            $modelName->save();
            $quoteCustomerId = $modelName->getId();
            Mage::getSingleton('core/session')->set('quote_customer_id', $quoteCustomerId);
        }
    }

    public function convert()
    {
        $this->initQuote();
        if ($this->getId()) {
            $orderId = Mage::getSingleton('sales/order')->addOrder($this);
            foreach ($this->getItemCollection()->getData() as $_item) {
                Mage::getSingleton('sales/order_item')->addOrderItem($_item, $orderId);
            }
            foreach ($this->getQuoteCustomerData()->getData() as $value) {
                Mage::getModel('sales/order_customer')->addOrderCustomer($value, $orderId);
            }
            foreach ($this->getOrderShipping()->getData() as $value) {
                $shippingId = Mage::getModel('sales/order_shipping')->addOrderShippingData($value, $orderId);
            }
            foreach ($this->getOrderPayment()->getData() as $value) {
                $paymentId = Mage::getModel('sales/order_payment')->addOrderPaymentData($value, $orderId);
            }
            Mage::getSingleton('sales/order')->addPaymentShippingId($paymentId, $shippingId);
            $this->addData('order_id', $orderId)
                ->save();
        }
    }
    public function addPayment($payment)
    {
        $this->initQuote();
        if ($this->getId()) {
            $id =  Mage::getModel("sales/quote_payment")->addPaymentMethod($this, $payment)->getId();
            $this->addData('payment_id', $id);
        }
        $this->save();
    }
    public function addShipping($shipping)
    {
        $this->initQuote();
        if ($this->getId()) {
            $id =  Mage::getModel("sales/quote_shipping")->addShippingMethod($this, $shipping)->getId();
            $this->addData('shipping_id', $id);
        }
        $this->save();
    }
}
