<?php 
class Tempconverter_Model_Tempconverter extends Core_Model_Abstract  {
    public function init(){
        $this->_resourceClass = 'Tempconverter_Model_Resource_Tempconverter';
        $this->_collectionClass = 'Tempconverter_Model_Resource_Collection_Tempconverter';
        $this->_modelClass = 'tempconverter/tempconverter';
    }
    protected function _beforeSave(){
        foreach($this->getCollection()->getData() as $_item){
            $item = $_item;
        }
        if($item->getUnit()=="Celsius" && $item->getConvertUnit()=="Celsius"){
            $result =  $item->getTemprature(); 
            $this->addData('result', $result);
            
        }
        elseif($item->getUnit()=="Celsius" && $item->getConvertUnit()=="Fahrenheit"){
            $result =  (9 / 5 * $item->getTemprature()) + 32; 
            $this->addData('result', $result);
        }
        elseif($item->getUnit()=="Celsius" && $item->getConvertUnit()=="Kelvin"){
            $result =  $item->getTemprature() + 273.15 ; 
            $this->addData('result', $result);
        }
        elseif($item->getUnit()=="Fahrenheit" && $item->getConvertUnit()=="Celsius"){
            $result =  (5 / 9 * $item->getTemprature())-32;  
            $this->addData('result', $result);
        }
        elseif($item->getUnit()=="Fahrenheit" && $item->getConvertUnit()=="Fahrenheit"){
            $result =  $item->getTemprature(); 
            $this->addData('result', $result);
        }
        elseif($item->getUnit()=="Fahrenheit" && $item->getConvertUnit()=="Kelvin"){
            $result =  5 / 9 * ($item->getTemprature() - 32) + 273.15; 
            $this->addData('result', $result);
        }
        elseif($item->getUnit()=="Kelvin" && $item->getConvertUnit()=="Celsius"){
            $result =  $item->getTemprature() - 273.15; 
            $this->addData('result', $result);
        }
        elseif($item->getUnit()=="Kelvin" && $item->getConvertUnit()=="Fahrenheit"){
            $result = ($item->getTemprature() - 273.15)  * (9 / 5) + 32  ;
            $this->addData('result', $result); 
        }
        elseif($item->getUnit()=="Kelvin" && $item->getConvertUnit()=="Kelvin"){
            $result = $item->getTemprature() ; 
            $this->addData('result', $result);
        }
    }
}
?>