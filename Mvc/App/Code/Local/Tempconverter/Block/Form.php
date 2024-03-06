<?php
class Tempconverter_Block_Form extends Core_Block_Template
{
    // public function getProduct() {
    //     return Mage::getModel('catalog/product')
    //         ->load($this->getRequest()->getParams('id',0));
    // }
    public function __construct()
    {
        $this->setTemplate("tempconverter/form.phtml");
    }
    public function getSessionId()
    {
        return Mage::getSingleton('core/session')->getId();
    }
}
