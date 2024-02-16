<?php

class Core_Block_Template extends Core_Block_Abstract
{
    public $template;
    protected $_child = [];
    public function toHtml(){
        $this->render();
    }
    public function addChild($key, $value){
        $this->_child[$key] = $value;
    }
    public function removeChild($key){

    }
    public function getChild($key){
        return isset($this->_child[$key]) ? $this->_child[$key] : null;
        
    }
    public function setTemplate($template){
        $this->template = $template;
    }
    public function getTemplate(){
    return $this->template;
    }
    public function getChildHtml($value){
       return $this->getChild($value)->toHtml();
    }
    public function getRequest(){
        return  Mage::getModel("Core/Request");
     }
}
?>