<?php
class Banner_Model_Resource_Banner
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function init($tablename, $primarykey)
    {
        $this->_tableName = $tablename;
        $this->_primaryKey = $primarykey;
    }
    public function load($id, $column = null)
    {
        $sql = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}={$id} LIMIT 1";
        // echo $sql;
        return $this->getAdapter()->fetchRow($sql);
        
    }
    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }
    public function getAdapter()
    {
        return new Core_Model_Db_Adapter();
    }
    //above part is abstract
    public function __construct()
    {
        $this->init('banner', 'banner_id');
    }
}
