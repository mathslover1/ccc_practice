<?php
class Admin_Model_Resource_Admin extends Core_Model_Resource_Abstract
{
    public function init($tablename, $primarykey)
    {
        $this->_tableName = $tablename;
        $this->_primarykey = $primarykey;
    }
    public function __construct()
    {
        $this->init('admin', 'admin_id');
    }
}
