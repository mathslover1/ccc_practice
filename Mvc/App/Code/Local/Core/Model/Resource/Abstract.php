<?php 

class Core_Model_Resource_Abstract {
    protected $_tableName = "";
    protected $_primarykey = "";
    public function getTableName(){
        return $this->_tableName;
    }
    public function init($tablename, $primarykey)
    {
        $this->_tableName = $tablename;
        $this->_primarykey = $primarykey;
    }
    public function load($id, $column = null)
    {
        $query = "SELECT * FROM {$this->_tableName} WHERE {$this->_primarykey} = {$id} LIMIT 1 ";
        return $this->getAdapter()->fetchRow($query);
    }
    public function save(Core_Model_Abstract $product)
    {
        $data = $product->getData();
        if(isset($data[$this->getPrimaryKey()]) && !empty($data[$this->getPrimaryKey()])){
        
            $sql = $this->updateSql(
                $this->getTableName(),
                $data,
                [$this->getPrimaryKey()=>$product->getId()]
            );
            $id = $this->getAdapter()->update($sql);
        }else{
        $sql = $this->insertSql($this->getTableName(),$data);
        $id = $this->getAdapter()->insert($sql);
        $product->setId($id);
    }
    }
    public function delete(Core_Model_Abstract $abstract )
    {
        $id = $abstract->getId();
        $where = [$this->getPrimaryKey() => $id];
        $sql = $this->deleteSql($this->getTableName(),$where);
        return $this->getAdapter()->delete($sql);
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
    public function deleteSql($table, $where)
    {
        foreach ($where as $key => $_value) {
            $whereClause[] = "`$key` = '" . addslashes($_value) . "'";
        }
        $whereClause = implode(" AND ", $whereClause);
        return "DELETE FROM {$table} WHERE {$whereClause}";
    } 
    public function updateSql($tablename,$data,$where){
        $coloumns = $whereCond = [];
    
        foreach($data as $_field => $_value){
            $coloumns[] = "`{$_field}`= " . "'" . ($_value) ."'";
    
        }
        $coloumns = implode(", ", $coloumns);
    
        foreach($where as $_field => $_value){
            $whereCond[] = "`$_field` = "."'" .($_value)."'";
    
        }
        $whereCond = implode(" AND ", $whereCond);
        return "UPDATE {$tablename} SET {$coloumns} WHERE {$whereCond}";
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

?>