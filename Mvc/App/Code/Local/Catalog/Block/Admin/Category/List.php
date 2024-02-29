<?php
class Catalog_Block_Admin_Category_List extends Core_Block_Template {
    public function __construct(){
        $this->setTemplate("catalog/admin/category/list.phtml"); 
    }
    public function getList(){
        $list = Mage::getModel("catalog/category")->getCollection();
        return $list->getData();
    }
    public function getUrl1(){
       return Mage::getBaseUrl("admin/catalog_category");
    }
}
?>