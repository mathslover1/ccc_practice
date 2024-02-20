<?php

class Catalog_Model_Resource_Product
{
    protected $_tableName = "";
    protected $_primarykey = "";
    public function init($tableName, $primarykey)
    {
        $this->_tableName = $tableName;
        $this->_primarykey = $primarykey;
    }
    public function getTableName(){
        return $this->_tableName;
    }
    // above part is abtract
    public function __construct()
    {
        $this->init('catalog_product', 'product_id');
    }
    public function load($id, $column = null)
    {
        $query = "SELECT * FROM {$this->_tableName} WHERE {$this->_primarykey} = {$id} LIMIT 1 ";
        //    echo $query;
        return $this->getAdapter()->fetchRow($query);
    }
    public function save(Catalog_Model_Product $product)
    {
        $data = $product->getData();
        if (isset($data[$this->getPrimaryKey()])) {
            unset($data[$this->getPrimaryKey()]);
        }
        $sql = $this->insertSql($this->getTableName(),$data);
        $id = $this->getAdapter()->insert($sql);
        $product->setId($id);
    }
    
    public function insertSql($tablename, array $data)
    {
        $columns = $values = [];
        foreach ($data as $col => $val) {
            $columns[] = "`$col`";
            $values[] = "'" . addslashes($val) . "'";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", $values);
        return "INSERT INTO {$tablename} ({$columns}) VALUES ({$values})";
    }
    public function getAdapter()
    {
        return new Core_Model_Db_Adapter();
    }
    public function getPrimaryKey()
    {
        return $this->_primarykey;
    }
}
