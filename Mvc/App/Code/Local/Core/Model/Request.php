<?php

class Core_Model_Request{
    protected $_controllerName,$_actionName,$_moduleName;
   
    public function __construct(){
        $requstUri = $this->getRequestUri();
        $requstUri =array_filter(explode("/",$requstUri));
        $this->_moduleName     = isset($requstUri[0])?$requstUri[0]:"page";
        $this->_controllerName = isset($requstUri[1])?$requstUri[1]:"index";
        $this->_actionName     = isset($requstUri[2])?$requstUri[2]:"index";
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
        return implode("_",[ucfirst($this->_moduleName),'Controller',ucfirst($this->_controllerName)]);
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