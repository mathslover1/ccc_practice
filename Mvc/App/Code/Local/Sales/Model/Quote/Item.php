<?php

class Sales_Model_Quote_Item extends Core_Block_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Quote_Resource_Item ';
        $this->_collectionClass = 'Sales_Model_Quote_Resource_Collection_Item ';
        $this->_modelClass = 'sales/quote_item';
    }
}


?>