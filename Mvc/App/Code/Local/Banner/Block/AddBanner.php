<?php

class Banner_Block_AddBanner  extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("banner/banner.phtml");
    }
    public function getBanner(){
        $list =  Mage::getModel("banner/banner")->getCollection();
        return $list->getData();
    }
}

?>