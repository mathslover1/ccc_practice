<?php 
class Bank_Model_Bank extends Core_Model_Abstract  {
    public function init(){
        $this->_resourceClass = 'Bank_Model_Resource_Bank';
        $this->_collectionClass = 'Bank_Model_Resource_Collection_Bank';
        $this->_modelClass = 'bank/bank';
    }
}
?>