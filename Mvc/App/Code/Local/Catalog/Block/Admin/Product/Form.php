<?php
    class Catalog_Block_Admin_Product_Form extends Core_Block_Template
    {
        public function getProduct() {
            return Mage::getModel('catalog/product')
                ->load($this->getRequest()->getParams('id',0));
        }
        public function __construct(){
            $this->setTemplate("catalog/admin/product/form.phtml");
        }
        // public function getStatuses(){
        //     $mapping = [
        //         1=>'E',
        //         0=>'D'
        //     ];
        //     if($this->getRequest()->getParams('id')){
        //     return $mapping[$this->_data['status']];
        // }else {
        //     $this->getProduct()->getStatus();
        // }
        // }

    }
?>