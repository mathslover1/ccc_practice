<?php
class Model_Product extends Model_Abstract
{
    public $tableName = "ccc_product";

    public function __construct()
    {
    }
    public function add($data){
        $sql=$this->getQueryBuilder()->insert('ccc_product',$data);
        return $this->getQueryExecutor()->execute($sql);
    }
    public function update($data,$where){
        $sql=$this->getQueryBuilder()->update('ccc_product',$data,$where);
        return $this->getQueryExecutor()->execute($sql);
    }
    public function delete($where){
        $sql=$this->getQueryBuilder()->delete('ccc_product',$where);
        return $this->getQueryExecutor()->execute($sql);
}
}