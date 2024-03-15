<?php

class Core_Controller_Admin_Action extends Core_Controller_Front_Action
{
    protected $_allowedAction = [];
  public function init(){
    $this->addLayout();
    $this->getLayout()->setTemplate('core/admin.phtml');
    if (
        !in_array($this->getRequest()->getActionName(), $this->_allowedAction) &&
        !Mage::getSingleton('core/session')->get('logged_in_admin_user_id')
    ) {
        $this->setRedirect('admin/user/login');
    }
    return $this;
  }
  public function addLayout(){
    $layout = $this->getLayout();
    $layout->getChild('head')->addCss('admin/header.css');
    $header = $layout->createBlock('admin/header');
    $layout->addChild('header', $header);
  }
}
?>
