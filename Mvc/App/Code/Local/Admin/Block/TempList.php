<?php
class Admin_Block_TempList extends Core_Block_Template
{

    public function __construct()
    {
        $this->setTemplate("tempconverter/admin/list.phtml");
    }
    public function getList()
    {
        $list =  Mage::getModel("tempconverter/tempconverter")->getCollection()->addFieldToFilter('unit','Kelvin');
        return $list->getData();
    }

}
