<?php
class Admin_Block_Temp_List extends Core_Block_Template
{

    public function __construct()
    {
        $this->setTemplate("tempconverter/admin/list.phtml");
    }
    public function getList()
    {
        $list =  Mage::getModel("tempconverter/tempconverter")->getCollection();
        return $list->getData();
    }

}
