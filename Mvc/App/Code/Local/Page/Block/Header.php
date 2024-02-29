<?php

class Page_Block_Header extends Core_Block_Template
{
    public function __construct(){
        $this->setTemplate("page/header.phtml");
    }
    public function getHeaderUrl($url){
            return Mage::getBaseUrl($url);
    }
}