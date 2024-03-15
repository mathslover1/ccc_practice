<?php
class Tempconverter_Block_Form extends Core_Block_Template
{
    // public function getProduct() {
    //     return Mage::getModel('catalog/product')
    //         ->load($this->getRequest()->getParams('id',0));
    // }
    public function __construct()
    {
        $this->setTemplate("tempconverter/form.phtml");
    }
    public function getSessionId()
    {
        return Mage::getSingleton('core/session')->getId();
    }
    public function getUnit(){
        $units = array(
            "Celsius" => "Celsius",
            "Fahrenheit" => "Fahrenheit",
            "Kelvin" => "Kelvin"
        );
        echo '<select id="unit" name="temperature[unit]" class="select-box">';
        foreach ($units as $value => $label) {
            echo '<option value="' . $value . '" ' . '>' . $label . '</option>';
        }
        echo '</select>';
    }
    public function getConvertUnit(){
        $units = array(
            "Celsius" => "Celsius",
            "Fahrenheit" => "Fahrenheit",
            "Kelvin" => "Kelvin"
        );
        echo '<select id="unit" name="temperature[convert_unit]" class="select-box">';
        foreach ($units as $value => $label) {
            echo '<option value="' . $value . '" ' . '>' . $label . '</option>';
        }
        echo '</select>';
    }
    public function userName(){
        echo  Mage::getSingleton('core/session')->get('User_name');
    }
}
