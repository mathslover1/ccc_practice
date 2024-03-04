<?php
class Catalog_Block_Category_View extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("catalog/category/view.phtml");
    }
    public function getItem()
    {
        $id = $this->getRequest()->getParams('id');
        if($id){
            $list =  Mage::getModel("catalog/product")->getCollection()->addFieldToFilter('category_id',$id);
            return $list->getData();
        }
        $list =  Mage::getModel("catalog/product")->getCollection();
        return $list->getData();
    }
    public function getCategoryNameById($id)
    {
        $catArr = Mage::getModel('catalog/product')->getCategoryArray();
        if (array_key_exists($id, $catArr)){
            return $catArr[$id];
        }
        return false;
    }
    public function getImagePath(){
        return Mage::getBaseUrl("media/product/");
    } 
}
