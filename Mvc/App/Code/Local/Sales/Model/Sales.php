<?php
class Sales_Model_Sales extends Core_Model_Abstract
{
    public function init(){
        $this->_resourceClass = 'Sales_Model_Resource_Sales';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Sales';
    }
}