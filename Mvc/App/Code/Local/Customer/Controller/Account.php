<?php

class Customer_Controller_Account extends Core_Controller_Front_Action
{
    protected $_allowedAction  = ['login', 'register'];
    public function init()
    {
        $this->getRequest()->getActionName();
        if (
            !in_array($this->getRequest()->getActionName(), $this->_allowedAction) &&
            !Mage::getSingleton('core/session')->get('logged_in_customer_id')
        ) {
            $this->setRedairect('customer/account/login');
        }
    }
    public function registerAction()
    {
        $layout =  $this->getLayout();
        $child = $layout->getChild('content');
        $layout->getChild('head')->addCss('customer/register.css');
        $layout->removeChild('header')->removeChild('footer');
        $register = $layout->createBlock('customer/register');
        $child->addChild('register', $register);
        $layout->getChild('content');
        $layout->toHtml();
    }
    public function loginAction()
    {
        $check = $this->getRequest()->isPost();
        if ($check) {
            $data = $this->getRequest()->getParams('customer');
            $customerModel = Mage::getModel('customer/customer')
                ->getCollection()
                ->addFieldToFilter('customer_email', $data['customer_email'])
                ->addFieldToFilter('password', $data['password']);
            $exists = "No";
            foreach ($customerModel->getData() as $customer) {
                $exists = "Yes";
                $customerId = $customer->getCustomerId();
            }
            if ($exists == "Yes") {
                Mage::getSingleton('core/session')->set('logged_in_customer_id', $customerId);
                $this->setRedairect("customer/account/dashboard");
            } else {
                $this->setRedairect("customer/account/dashboard");
            }
        } else {
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
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('customer');
        $productModel = Mage::getModel('customer/customer');
        $productModel->setData($data)->save();
        $location = Mage::getBaseUrl("customer/account/login");
        header("Location: $location");
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
    public function forgotpasswordAction()
    {
        $layout =  $this->getLayout();
        $child = $layout->getChild('content');
        // $layout->getChild('head')->addCss('header.css');
        $dashboard = $layout->createBlock('customer/forgotpassword');
        $child->addChild('dashboard', $dashboard);
        $layout->toHtml();
    }
}
