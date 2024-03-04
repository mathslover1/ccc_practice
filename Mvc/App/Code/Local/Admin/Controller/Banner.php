<?php

class Admin_Controller_Banner extends Core_Controller_Admin_Action
{
    protected $_allowedAction = [];
    public function includefile($newfile)
    {
        $newfile->addCss("banner/form.css");
        $newfile->addCss("banner/list.css");
    }
    public function formAction()
    {
        $layout = $this->getLayout();
        $newfile =  $layout->getChild("head");
        $this->includefile($newfile);
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('banner/form');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $banner = $this->getRequest()->getParams('banner');
        if (isset($_POST['submit'])) {
            $imageName = $_FILES['banner_image']['name'];
            $tmp_name = $_FILES['banner_image']['tmp_name'];
            $folder = "media/banner/" . $imageName;
            move_uploaded_file($tmp_name, $folder);

        }
        $banner['banner_image'] = $imageName;
        $_product = Mage::getModel('banner/banner')
            ->setData($banner)
            ->save();
        $this->setRedirect('admin/banner/list');
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getparams("id");
        $product = Mage::getModel("banner/banner")->load($id);
        $product->delete();
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $newfile =  $layout->getChild("head");
        $this->includefile($newfile);
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('banner/list');
        $child->addChild('list', $productForm);
        $layout->toHtml();
    }
}