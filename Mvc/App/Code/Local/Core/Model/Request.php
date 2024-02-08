<?php

class Core_Model_Request{
    protected $_controllerName,$_actionName,$_moduleName;
   
    public function __construct(){
        $requstUri = $this->getRequestUri();
        $requstUri = explode("/",$requstUri);
        $this->_moduleName = $requstUri[0];
        $this->_controllerName = $requstUri[1];
        $this->_actionName = $requstUri[2];
        

    }
    public function getRequestUri() 
    {
        $requst = $_SERVER["REQUEST_URI"];
        $uri = str_replace("/Internship/Mvc/", "", $requst);
        return $uri;
    }
    public function getModuleName(){
        return $this->_moduleName;
    }
    public function getControllerName(){
        return $this->_controllerName;
    }
    public function getActionName(){
        return $this->_actionName;
    }
    public function getFullControllerClass(){
        return implode("_",['Page','Controller',ucfirst($this->_controllerName)]);
    }
    public function getparams($keys=''){
        return ($keys == '')
        ? $_REQUEST
        : (isset($_REQUEST[$keys])
            ? $_REQUEST[$keys]
            : ''
        );
    }
    public function getPostData($keys=''){
        return ($keys == '')
        ? $_POST
        : (isset($_POST[$keys])
            ? $_POST[$keys]
            : ''
        );
    }
    public function getGetData($keys=''){
        return ($keys == '')
        ? $_GET
        : (isset($_GET[$keys])
            ? $_GET[$keys]
            : ''
        );
    }
    public function isPost()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    return true;
		}
		return false;
	}
}

?>