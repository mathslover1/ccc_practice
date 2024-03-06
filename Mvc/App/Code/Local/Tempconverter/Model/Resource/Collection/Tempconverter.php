<?php 
class Tempconverter_Model_Resource_Collection_Tempconverter extends Core_Model_Resource_Collection_Abstract {
    public function applyLimit($limit)
    {
        $this->_select['LIMIT'][] = $limit;
        return $this;
    }
}
?>