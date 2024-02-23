<?php
class Catalog_Block_Admin_Product_List extends Core_Block_Template {
    public function __construct(){
        $this->setTemplate("catalog/admin/product/list.phtml"); 
    }
    public function getList(){
        return Mage::getModel('Admin_Controller_Catalog/product')->load($this->getRequest()->getParams('id',0));
    }
}
?>