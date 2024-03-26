<?php 

class Customer_Block_Login extends Core_Block_Template {
    public function __construct(){
        $this->setTemplate('customer/account/login.phtml');
    }
    public function getField(){
        $options = [
            'value1' => 'Option 1',
            'value2' => 'Option 2',
            'value3' => 'Option 3'
        ];  
        echo $this->getRender('dropdown', [
            'id' => 'abc',
            'name' => 'login',
            'label' => 'Login',
            'options' => $options
        ]);
    }
    
}

?>