<?php
class Tempconverter_Block_List extends Core_Block_Template
{

    public function __construct()
    {
        $this->setTemplate("tempconverter/list.phtml");
    }
    public function getList()
    {
        $list =  Mage::getModel("tempconverter/tempconverter")->getCollection()->applyLimit(10);
        return $list->getData();
    }

}
