<?php

class Page_Block_Head extends Core_Block_Template
{
    protected $_js =[];
    protected $_css =[];
    public function __construct(){
        $this->setTemplate("page/head.phtml");
    }
    public function addjs($file){
        $this->_js[] = $file;
    }
    public function addcss($file){
        $this->_css[] = $file;
    }
    public function getjs(){
        return $this->_js;
    }
    public function getcss(){
        return $this->_css;
    }
}