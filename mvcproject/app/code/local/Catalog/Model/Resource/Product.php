<?php
    class Catalog_Model_Resource_Product extends Core_Model_Resource_Abstract
    {
        // protected $_tableName = null;
        // protected $_primaryKey = null;
        // public function __construct()
        // {
        //     $this->init();
        // }
        // public function getPrimaryKey()
        // {
        //     return $this->_primaryKey;
        // }
        // public function getTableName()
        // {
        //     return $this->_tableName;
        // }
        // public function getAdapter()
        // {
        //     return new Core_Model_DB_Adapter();
        // }
        // public function load($id,$columns=null)
        // {
        //     $sql = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}= {$id} LIMIT 1";
        //     return $this->getAdapter()->fetchRow($sql);
        // }
        // public function save(Catalog_Model_Product   $product)
        // {  
        //     $data = $product->getData();
        //     // print_r($data); 
        //     if(isset($data[$this->getPrimaryKey()]))
        //     {
        //         unset( $data[$this->getPrimaryKey()]);
        //     }

        //     $sql = $this->inserSql($this->getTableName(),$data);
        //     $id =  $this->getAdapter()->insert($sql);
        //     $product->setId($id);
        //     // print_r($product);
        // }

        // public function inserSql($tableName, $data)
        // {

        //     $columns = $values = [];
        //     foreach ($data as $key => $value) {
        //         $columns[] = sprintf("`%s`", $key);
        //         $values[]  = sprintf("'%s'", addslashes($value));
        //     }
        //     $columns = implode(",", $columns);
        //     $values = implode(",", $values);
        //     return "INSERT INTO {$tableName} ({$columns}) VALUES ({$values});";
        // }
        // Above all code move to resourse abstract
        public function init()
        {
            $this->_tableName = "ccc_product";
            $this->_primaryKey = "product_id";
        }
    }
?>