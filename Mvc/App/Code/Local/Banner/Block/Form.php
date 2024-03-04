<?php 

class Banner_Block_Form extends Core_Block_Template {
    public function __construct(){
        $this->setTemplate('banner/form.phtml');
    }
    public function getBannerForm() {
        return Mage::getModel('banner/banner')
            ->load($this->getRequest()->getParams('id',0));
    }
    public function getImageLink() {
        return Mage::getBaseUrl("media/banner/");
    }
}

?>