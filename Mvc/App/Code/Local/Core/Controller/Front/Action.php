<?php

class Core_Controller_Front_Action
{
  protected $_layout = null;
  protected $_allowedAction = [];
  public function __construct()
  {
    $this->init();
    $layout = $this->getLayout();
    $layout->getChild("head")->addCss("header.css");
    $layout->getChild("head")->addCss("footer.css");
    $layout->getChild("head")->addJs("header.js");
    $layout->getChild("head")->addJs("jquery-3.7.1.js");
  }
  public function init()
  {
    return $this;
  }
  public function getLayout()
  {
    if (is_null($this->_layout)) {
      $this->_layout =  Mage::getBlock("Core/layout");
    }
    return $this->_layout;
  }
  public function getRequest()
  {
    return Mage::getModel("core/request");
  }
  public function setRedirect($url)
  {
    $url = Mage::getBaseUrl() . "/" . $url;
    header("Location:" . $url);
  }
  public function checkDataAndRedirect(array $data)
  {
    foreach ($data as $_keys => $_values) {
      if (!$_values) {
        $this->setRedirect($_keys);
        break;
      }
    }
  }
}
