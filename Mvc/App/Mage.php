<?php

class Mage{
    public static function  init(){
        // $request_model = new App_Code_Local_Core_Controller_Model_Request();
        $frontController = new Core_Controller_Front();
        $frontController->init();
        // $requestModel= Mage::getModel('core/request');
        // $requestUri = $requestModel->getRequestUri();
        // echo get_class($request_model);
        // echo $requestUri;  
    }
    public static function getModel($modelName){
        $modelName= ucwords(str_replace('/','_Model_',$modelName),'_');
        return new  $modelName;
    }
    public static function getSingleton(){
    }
    public static function register(){
    }
    public static function registry(){
    }
    public static function getBaseDir(){
    }
}

?>