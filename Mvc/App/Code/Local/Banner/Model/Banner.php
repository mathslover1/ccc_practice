<?php
class Banner_Model_Banner extends Core_Model_Abstract
{
    public function init(){
        $this->_resourceClass = 'Banner_Model_Resource_Banner';
        $this->_collectionClass = 'Banner_Model_Resource_Collection_Banner';
        $this->_modelClass = 'banner/banner';
    }
    public function getStatuses(){
        $mapping = [
            1=>'Enabled',
            0=>'Disabled'
        ];
        return $mapping[$this->_data['status']];
    }
}