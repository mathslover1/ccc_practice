<?php
class Catalog_Block_Admin_Product_List extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("catalog/admin/product/list.phtml");
    }
    public function getList()
    {
        $id = $this->getRequest()->getParams('id');
        if($id){
            $list =  Mage::getModel("catalog/product")->getCollection()->addFieldToFilter('category_id',$id);
            return $list->getData();
        }
        $list =  Mage::getModel("catalog/product")->getCollection();
        return $list->getData();
    }
    public function getUrl2()
    {
        return  Mage::getBaseUrl("admin/catalog_product");
    }
    public function getCategoryNameById($id)
    {
        $catArr = Mage::getModel('catalog/product')->getCategoryArray();
        if (array_key_exists($id, $catArr)){
            return $catArr[$id];
        }
        return false;
    }
}
