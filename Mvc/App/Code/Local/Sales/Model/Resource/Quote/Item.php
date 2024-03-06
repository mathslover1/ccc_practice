<?php

class Sales_Model_Resource_Quote_Item extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('sales_quote_item', 'item_id');
    }
    public function init($tableName, $primaryKey)
    {
        $this->_tableName = $tableName;
        $this->_primarykey = $primaryKey;
    }

}

