<?php

class Core_Controller_Front_Action
{
  protected $_layout = null;
  protected $_allowedAction = [];
  public function __construct(){
    $this->init();
    $layout = $this->getLayout();
      $layout->getChild("head")->addCss("header.css");
      $layout->getChild("head")->addCss("footer.css");
      $layout->getChild("head")->addJs("header.js");
  }
  public function init(){
    if (
      !in_array($this->getRequest()->getActionName(), $this->_allowedAction) &&
      !Mage::getSingleton('core/session')->get('logged_in_customer_user_id')
  ) {
      $this->setRedirect('customer/account/login');
  }
  return $this;
  }
  public function getLayout()
  {
    if (is_null($this->_layout)) {
      $this->_layout =  Mage::getBlock("Core/layout");
    }
    return $this->_layout;
  }
  public function getRequest(){
    return Mage::getModel("core/request");
  }
  public function setRedirect($url){
      $url = Mage::getBaseUrl()."/".$url;
      header("Location:".$url); 
  }
}
