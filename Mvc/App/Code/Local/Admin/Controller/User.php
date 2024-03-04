<?php 

class Admin_Controller_User extends Core_Controller_Admin_Action{
    protected $_allowedAction = ['login'];
    public function loginAction() {
        $check = $this->getRequest()->isPost();
        if ($check) {
            $data = $this->getRequest()->getParams('admin');
            $adminModel = Mage::getModel('admin/admin')
                ->getCollection()
                ->addFieldToFilter('admin_email', $data['admin_email'])
                ->addFieldToFilter('password', $data['password']);
            $exists = "No";
            foreach ($adminModel->getData() as $admin) {
                $exists = "Yes";
                $adminId = $admin->getAdminId();
            }
            if ($exists == "Yes") {
                Mage::getSingleton('core/session')->set('logged_in_admin_user_id', $adminId);
                $this->setRedirect("admin");
            } else {
                $this->setRedirect("admin/user/login");
            }
        } else {
            $layout =  $this->getLayout();
            $child = $layout->getChild('content');
            $layout->getChild('head')->addCss('customer/login.css');
            $layout->removeChild('header')->removeChild('footer');
            $register = $layout->createBlock('admin/admin');
            $child->addChild('login', $register);
            $layout->getChild('content');
            $layout->toHtml();
        }

    }
    public function logoutAction() {
        Mage::getSingleton('core/session')->unsetAll();
        $this->setRedirect("admin/user/login");
    }

}

?>