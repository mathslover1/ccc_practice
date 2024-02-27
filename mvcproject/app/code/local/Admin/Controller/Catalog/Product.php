<?php
    class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
    {
            public function formAction()
    {   //echo 1;
        $layout = $this->getLayout();
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addCss('css/page.css');
        $layout->getChild('head')->addCss('css/head.css');
        $child = $layout->getChild('content');

        $productForm = $layout->createBlock('catalog/admin_product_form')
            ->setTemplate('catalog/admin/product/form.phtml');
        $child->addChild('form', $productForm);


        $layout->toHtml();

    }


    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addCss('css/page.css');
        $layout->getChild('head')->addCss('css/head.css');
        $child = $layout->getChild('content');

        $productForm = $layout->createBlock('catalog/admin_product_list')
            ->setTemplate('catalog/admin/product/list.phtml');
        $child->addChild('list', $productForm);


        $layout->toHtml();

    }
        public function saveAction()
        {
            $data = $this->getRequest()->getParams('pdata');
            $productModel = Mage::getModel('catalog/product');
            // $productModel->setData($data);
            // print_r($productModel);
            $productModel->setData($data)->save();
            print_r($productModel);
        }

        public function deleteAction(){
            
            Mage::getModel('catalog/product')
                ->load($this->getRequest()->getParams('id',0))
                ->delete();

        }
    }
        
        
?>