<?php 

class Controller_Front{
    public function init()
    {
        $request_uri = new Model_Request();
        $request_uri =  $request_uri->getrequestUri();
        $request_uri = str_replace("/Internship/practice/product","", $request_uri);
        $request_uri = 'view'.$request_uri;
        $request_uri =  str_replace("/","_", $request_uri);
        $layout = new $request_uri();
        echo $layout->toHTML();
    }
}

?>