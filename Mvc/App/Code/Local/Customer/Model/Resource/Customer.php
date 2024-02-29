<?php
class Customer_Model_Resource_Customer extends Core_Model_Resource_Abstract{
    public function init($tableName, $primarykey)
    {
        $this->_tableName = $tableName;
        $this->_primarykey = $primarykey;
    }
    public function __construct()
    {
        $this->init('customer', 'customer_id');
    }
}
?>