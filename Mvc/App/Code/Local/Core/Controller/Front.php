<?php 
class Core_Controller_Front{
    public static function  init(){
       $coreRequestModel = Mage::getModel("Core/Request");
       $actionName =  $coreRequestModel->getActionName()."Action";
       $frontControllerClass = $coreRequestModel->getFullControllerClass();
       $frontControllerObj = new $frontControllerClass();
       $frontControllerObj->$actionName();
    }
}

?>