<?php 
class Tempconverter_Model_Tempconverter extends Core_Model_Abstract  {
    public function init(){
        $this->_resourceClass = 'Tempconverter_Model_Resource_Tempconverter';
        $this->_collectionClass = 'Tempconverter_Model_Resource_Collection_Tempconverter';
        $this->_modelClass = 'tempconverter/tempconverter';
    }
    protected function _beforeSave(){
        if($this->getUnit()=="Celsius" && $this->getConvertUnit()=="Celsius"){
            $result =  $this->getTemprature(); 
            $this->addData('result', $result);
        }
        elseif($this->getUnit()=="Celsius" && $this->getConvertUnit()=="Fahrenheit"){
            $result =  (9 / 5 * $this->getTemprature()) + 32; 
            $this->addData('result', $result);
        }
        elseif($this->getUnit()=="Celsius" && $this->getConvertUnit()=="Kelvin"){
            $result =  $this->getTemprature() + 273.15 ; 
            $this->addData('result', $result);
        }
        elseif($this->getUnit()=="Fahrenheit" && $this->getConvertUnit()=="Celsius"){
            $result =  (5 / 9 * $this->getTemprature())-32;  
            $this->addData('result', $result);
        }
        elseif($this->getUnit()=="Fahrenheit" && $this->getConvertUnit()=="Fahrenheit"){
            $result =  $this->getTemprature(); 
            $this->addData('result', $result);
        }
        elseif($this->getUnit()=="Fahrenheit" && $this->getConvertUnit()=="Kelvin"){
            $result =  5 / 9 * ($this->getTemprature() - 32) + 273.15; 
            $this->addData('result', $result);
        }
        elseif($this->getUnit()=="Kelvin" && $this->getConvertUnit()=="Celsius"){
            $result =  $this->getTemprature() - 273.15; 
            $this->addData('result', $result);
        }
        elseif($this->getUnit()=="Kelvin" && $this->getConvertUnit()=="Fahrenheit"){
            $result = ($this->getTemprature() - 273.15)  * (9 / 5) + 32  ;
            $this->addData('result', $result); 
        }
        elseif($this->getUnit()=="Kelvin" && $this->getConvertUnit()=="Kelvin"){
            $result = $this->getTemprature() ; 
            $this->addData('result', $result);
        }
    }
}
?>