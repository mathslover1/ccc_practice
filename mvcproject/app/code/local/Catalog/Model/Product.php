<?php

class Catalog_Model_Product extends Core_Model_Abstract
{
    public function init()
    {
        $this->resourceClass = "Catalog_Model_Resource_Product";
        $this->collectionClass = "Catalog_Model_Resource_Collection_Product";
    }

    public function getStatus() {
        $mapping = [1=>'E',0=>'d'];
        if(isset($this->_data['status'])){
            return $mapping[$this->_data['status']];

        }
    }
    
}

?>