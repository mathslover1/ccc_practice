<?php
 class Page_Controller_Index extends Core_Controller_Front_Action
 {
    public function indexAction()
    {
        //echo "<pre>";
        $layout = $this->getLayout();
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addCss('css/page.js');
        $layout->getChild('head')->addCss('css/head.js');
        //print_r($layout);
        $child = $layout->getChild('content');
        $banner = $layout->createBlock('core/template')
            ->setTemplate("banner/banner.phtml");
        $child->addChild("banner",$banner);

        $layout->toHtml();
    }

    // public function indexAction()
    // {
    //     //   echo "<pre>";
    //     $layout = $this->getLayout();
    //     $layout->getChild('head')->addJs('js/page.js');
    //     $layout->getChild('head')->addJs('js/head.js');
    //     $layout->getChild('head')->addCss('css/page.js');
    //     $layout->getChild('head')->addCss('css/head.js');
    //     // print_r($layout);
    //     $layout->toHtml();
    //     // // echo '<pre>';
    //     // $this->getLayout()
    //     //   ->toHtml();
    //     // // print_r($this->getLayout());
    //     // // echo dirname(__FILE__); 
        
    // }
//     public function saveAction()
//     {
//         echo "Save Data";
//     }
  }
  ?>