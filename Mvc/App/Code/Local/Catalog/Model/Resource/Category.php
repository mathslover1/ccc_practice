<?php

class Catalog_Model_Resource_Category extends Core_Model_Resource_Abstract
{
    public function init($tableName, $primarykey)
    {
        $this->_tableName = $tableName;
        $this->_primarykey = $primarykey;
    }
    public function __construct()
    {
        $this->init('catalog_category', 'category_id');
    }
    
}
