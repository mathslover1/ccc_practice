<?php

class Page_Block_Header extends Core_Block_Template
{
    public function __construct(){
        $this->setTemplate("page/header.phtml");
    }
    public function getHeaderUrl($url){
            return Mage::getBaseUrl($url);
    }
    public function loginLogout(){
        if(Mage::getSingleton('customer/session')->get('logged_in_customer_user_id')){
            echo  $this->getHeaderUrl('customer/account/logout');
        }else{
            echo  $this->getHeaderUrl('customer/account/login');
        }
    }
}