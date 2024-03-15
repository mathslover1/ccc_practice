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
        $quoteId = Mage::getSingleton('core/session')->get('quote_id', 0);
        if (!$quoteId) {
            $quote = Mage::getModel('sales/quote')
                ->setData(['tax_percent' => 8, 'grand_total' => 0])
                ->save();
            Mage::getSingleton('core/session')
                ->set('quote_id', $quote->getId());
            $quoteId = $quote->getId();
            $this->load($quoteId);
        } else {
            $this->load($quoteId);
        }
        return $this;
    }
    public function getItemCollection()
    {
        return Mage::getModel('sales/quote_item')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }
    public function getQuoteCustomer()
    {
        return Mage::getModel('sales/quote_customer')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
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
            $order = Mage::getModel('sales/order')
                ->setData($this->getData())
                ->removeData('quote_id')
                ->removeData('payment_id')
                ->removeData('shipping_id')
                ->save();
            foreach ($this->getItemCollection()->getData() as $_item) {
                $data = Mage::getModel('catalog/product')->load($_item->getProductId());
                Mage::getModel('sales/order_item')
                    ->setData($_item->getData())
                    ->removeData('quote_id')
                    ->removeData('item_id')
                    ->addData('product_name', $data->getName())
                    ->addData('product_color', $data->getColor())
                    ->addData('order_id', $order->getId())
                    ->save();
            }
            foreach ($this->getQuoteCustomer()->getData() as $value) {
                Mage::getModel('sales/order_customer')
                    ->setData($value->getData())
                    ->removeData('quote_customer_id')
                    ->removeData('quote_id')
                    ->addData('order_id', $order->getId())
                    ->save();
            }
            $this->addData('order_id', $order->getId())
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
