<?php
class Sales_Model_Quote_Resource_Customer extends Core_Model_Resource_Abstract
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function init($tablename, $primarykey)
    {
        $this->_tableName = $tablename;
        $this->_primaryKey = $primarykey;
    }
    public function __construct()
    {
        $this->init('sales_quote_customer', 'quote_customer_id');
    }
}
