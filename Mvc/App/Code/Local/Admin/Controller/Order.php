<?php 
class Admin_Controller_Order extends Core_Controller_Admin_Action{
    public function indexAction() {
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss('admin/order.css');
        $order = $layout->createBlock("admin/order");
        $layout->getChild("content")
                    ->addChild('order',$order);
        $layout->toHtml();
    }
}

?>