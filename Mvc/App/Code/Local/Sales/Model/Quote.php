<?php

class Sales_Model_Quote extends Core_Block_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Quote_Resource';
        $this->_collectionClass = 'Sales_Model_Quote_Resource_Collection';
        $this->_modelClass = 'sales/quote';
    }
}
