<?php

class Core_Block_Layout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('core/1column.phtml');
        // return $this;
        $this->prepareChildren();

    }
    public function prepareChildren()
    {
        // echo "<pre>";
     $head = $this->createBlock('page/head');
     $this->addChild('head',$head);  
     // print_r($head);
            
    $header = $this->createBlock('page/header');
    $this->addChild('header',$header); 
    // print_r($header);
    
    $content = $this->createBlock('page/content');
    $this->addChild('content',$content);  
    // print_r($head);

    $footer = $this->createBlock('page/footer');
    $this->addChild('footer',$footer); 
    // print_r($footer);
    
    }
    public function createBlock($className)
    {
       return  Mage::getBlock($className);
        // ->setLayout($this);
    }
    
}