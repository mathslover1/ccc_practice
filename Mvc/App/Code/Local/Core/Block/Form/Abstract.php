<?php

class Core_Block_Form_Abstract
{
    protected $_attribute = [];
    public function setAttribute($attribute)
    {
        $this->_attribute = $attribute;
        return $this;
    }
    public function getAttribute()
    {
        return $this->_attribute;
    }
    public function addAttribute()
    {
    }
    public function removeAttribute()
    {
    }
    public function getLabel()
    {
        if (isset($this->_attribute['label'])) {
            return $this->_attribute['label'];
        }
    }
    public function getId()
    {
        if (isset($this->_attribute['id'])) {
            return $this->_attribute['id'];
        }
    }
    public function getName()
    {
        if (isset($this->_attribute['name'])) {
            return $this->_attribute['name'];
        }
    }
    public function getOptions()
    {
        if (isset($this->_attribute['options'])) {
            return $this->_attribute['options'];
        }
    }
}
