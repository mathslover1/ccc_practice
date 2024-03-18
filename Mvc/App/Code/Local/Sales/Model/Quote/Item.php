<?php

class Sales_Model_Quote_Item extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Item';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Item';
        $this->_modelClass = 'sales/quote_item';
    }

    public function getProduct()
    {
        return Mage::getModel('catalog/product')->load($this->getProductId());
    }
    protected function _beforeSave()
    {
        if ($this->getProductId()) {
            $price = $this->getProduct()->getPrice();
            $this->addData('price', $price);
            $this->addData('row_total', $price * $this->getQty());
        }
    }
    public function addItem(Sales_Model_Quote $quote, $productId, $qty, $itemId = null)
    {
        
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_user_id');
        $item = $this->getCollection()
            ->addFieldToFilter('product_id', $productId)
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();
            if ($item) {
                if (!$itemId) {
                    $qty += $item->getQty();
                    $this->setId($item->getId());
                } else {
                    $this->setId($itemId);
                }
            }
            $this->addData('product_id', $productId)
                ->addData('quote_id', $quote->getId())
                // ->addData('customer_id', $customerId)
                ->addData('qty', $qty);
        $this->save();
        return $this;
    }
    public function deleteItem($quoteId, $itemId)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('quote_id', $quoteId)
            ->addFieldToFilter('item_id', $itemId)
            ->getFirstItem();
        if ($item) {
            $this->setId($item->getId());
        }
        $this->delete();

        return $this;
    }
}
