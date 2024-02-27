<?php

class Core_Controller_Front
{
    public function init()
    {
        $request = Mage ::getModel('core/request');                //Core_Model_Request
        $actionName = $request->getActionName().'Action';          //indexAction
        $fullClassName = $request->getFullControllerClass();       //Page_Controller_Index
        $controller = new $fullClassName();                        //create new object for class  Page_Controller_Index
        $controller ->$actionName();                               //call indexAction method in Page_Controller_Index class
    }
}