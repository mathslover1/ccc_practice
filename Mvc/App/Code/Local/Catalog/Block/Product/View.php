<?php
class Catalog_Block_Product_View extends Core_Block_Template
{

    public $_filterEmail = '';
    public function __construct()
    {
        $this->setTemplate("catalog/product/view.phtml");
    }
    public function getItem()
    {
        $id = $this->getRequest()->getParams('id');
        if ($id) {
            $list =  Mage::getModel("catalog/product")->getCollection()->addFieldToFilter('product_id', $id);
            return $list->getData();
        }
        if ($this->getRequest()->isPost()) {
            $filterEmail = $this->getRequest()->getParams('category');
          $list =  Mage::getModel("catalog/product")->getCollection()->addFieldToFilter('category_id',['like' => "%$filterEmail%"]);
        } else {
            $list =  Mage::getModel("catalog/product")->getCollection();
        }
        return $list->getData();
    }
    public function getUrl2()
    {
        return  Mage::getBaseUrl("admin/catalog_product");
    }
    public function getCategoryNm()
    {
        return Mage::getModel('catalog/category')->getCollection()->getData();
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

