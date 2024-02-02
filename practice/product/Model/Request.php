<?php

class Model_Request{
    public function __construct(){

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