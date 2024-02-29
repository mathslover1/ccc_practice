<?php 

class Admin_Controller_User extends Core_Controller_Admin_Action{
    protected $_allowedAction = ['login'];
    public function loginAction() {
        $layout =  $this->getLayout();
        $child = $layout->getChild('content');
        $layout->getChild('head')->addCss('customer/login.css');
        $layout->removeChild('header')->removeChild('footer');
        $register = $layout->createBlock('customer/login');
        $child->addChild('login', $register);
        $layout->getChild('content');
        $layout->toHtml();
    }
}

?>