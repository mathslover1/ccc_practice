<?php 

class Catalog_Model_Product extends Core_Model_Abstract
{
    public function init(){
        $this->_resourceClass = 'Catalog_Model_Resource_Product';
        $this->_collectionClass = 'Catalog_Model_Resource_Collection_Product';
        $this->_modelClass = 'catalog/product';
    }
    public function getStatuses(){
        $mapping = [
            1=>'Enabled',
            0=>'Disabled'
        ];
        return $mapping[$this->_data['status']];
    }
    public function getCategoryArray()
    {
        $category = Mage::getModel('catalog/category')->getCollection();
        $catData = $category->getData();
        if (isset($this->_data)) {
            foreach ($category->getData() as $catData) {
                $this->_data[$catData->getCategoryId()] = $catData->getCategoryName();
            }
        }
        return $this->_data;
    }
}

?>