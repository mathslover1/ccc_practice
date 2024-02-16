<?php

class Product_Model_Resource_Product{
    protected $_tableName ="";
    protected $_primarykey = "";
    public function init($tableName, $primarykey)
    {
        $this->_tableName = $tableName;
        $this->_primarykey = $primarykey;
    }
    // above part is abtract
    public function __construct()
    {
        $this->init('ccc_product','product_id');
    }

}

?>