<?php
    class Catalog_Block_Admin_Category_Form extends Core_Block_Template
    {
        public function getProduct() {
            return Mage::getModel('catalog/product')
                ->load($this->getRequest()->getParams('id',0));
        }
        public function __construct(){
            $this->setTemplate("catalog/admin/category/form.phtml");
        }

    }
?>