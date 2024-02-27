<?php
class Catalog_Block_Admin_Category_List extends Core_Block_Template {
    public function __construct(){
        $this->setTemplate("catalog/admin/category/list.phtml"); 
    }
    public function getList(){
        return Mage::getModel('Admin_Controller_Catalog/category')->load($this->getRequest()->getParams('id',0));
    }
}
?>