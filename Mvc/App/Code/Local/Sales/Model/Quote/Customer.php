<?php

class Sales_Model_Quote_Customer extends Core_Block_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Quote_Resource_Customer';
        $this->_collectionClass = 'Sales_Model_Quote_Resource_Collection_Customer';
        $this->_modelClass = 'sales/quote_customer';
    }
}
