<?php

class Tempconverter_Controller_Tempconverter extends Core_Controller_Front_Action
{

    public function formAction(){
        $layout = $this->getLayout();
        $layout->removeChild('header')->removeChild('footer');
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('tempconverter/form');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function listAction(){
        $layout = $this->getLayout();
        $layout->removeChild('header')->removeChild('footer');
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('tempconverter/list');
        $child->addChild('list', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('temperature');
        $productModel = Mage::getModel('tempconverter/tempconverter');
        $productModel->setData($data)->save();
        Mage::getSingleton('core/session')->set('User_name',$data["user_name"]);
        $this->setRedirect('tempconverter/Tempconverter/list');
    }
    public function dashboardAction()
    {
        $layout =  $this->getLayout();
        $child = $layout->getChild('content');
        $layout->getChild('head')->addCss('header.css');
        $dashboard = $layout->createBlock('customer/dashboard');
        $child->addChild('dashboard', $dashboard);
        $layout->toHtml();
    }
}
