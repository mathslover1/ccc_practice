<?php
class Admin_Model_Admin extends Core_Model_Abstract
{
    public function init(){
        $this->_resourceClass = 'Admin_Model_Resource_Admin';
        $this->_collectionClass = 'Admin_Model_Resource_Collection_Admin';
        $this->_modelClass = 'Admin/Admin';
    }
}