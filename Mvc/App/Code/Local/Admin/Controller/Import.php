<?php
class Admin_Controller_Import extends Core_Controller_Admin_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss("import/form.css");
        $banner  = $layout->createBlock("import/form");
        $layout->getChild("content")
            ->addChild('form', $banner);
        $layout->toHtml();
    }
    public function saveAction()
    {
        if (isset($_POST['submit'])) {
            $fileData = $_FILES['import_file']['name'];
            $tmp_name = $_FILES['import_file']['tmp_name'];
            $folder = "media/import/" . $fileData;
            move_uploaded_file($tmp_name, $folder);
        }
        $this->setRedirect('admin/import/list');
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")->addCss("import/list.css");
        $banner  = $layout->createBlock("import/list");
        $layout->getChild("content")
            ->addChild('list', $banner);
        $layout->toHtml();
    }
    public function readAction()
    {
        $file = $this->getRequest()->getParams('file');
        $file = Mage::getBaseDir('media/import/') . $file;

        $file = fopen($file, 'r');
        $column = fgetcsv($file);
        while ($data = fgetcsv($file)) {
            $data = array_combine($column, $data);
            $data = json_encode($data);
            Mage::getModel('import/import')
                ->addData('json', $data)
                ->addData('type', 'product')
                ->save();
        }
        fclose($file);
        $this->setRedirect('admin/import/readedlist');
    }
    public function readedlistAction()
    {
        $layout = $this->getLayout();
        $layout->getChild("head")
            ->addCss("import/list.css");
        $layout->getChild("head")
            ->addJs("import/list.js");
        $banner  = $layout->createBlock("import/readedlist");
        $layout->getChild("content")
            ->addChild('readedlist', $banner);
        $layout->toHtml();
    }
    public function importAction()
    {
        $type = $this->getRequest()->getParams('type');

        $importItem = Mage::getModel('import/import')
            ->getCollection()
            ->addFieldToFilter('type', $type)
            ->addFieldToFilter('status', 0)
            ->getFirstItem();
        $product = Mage::getModel('catalog/product')
            ->setData(json_decode($importItem->getJson(), true))
            ->save()
            ->getId();
        if ($product) {
            $importItem->addData('status', 1)->save();
            echo "true";
        } else {
            echo "false";
        }
    }
}
