<?php

class Core_Block_Form_File extends Core_Block_Form_Abstract {
    public function toHtml()
    {
        $input = '';
        if ($this->getLabel() && $this->getId()){
            $input .= '<label for="'. $this->getId(). '">'. $this->getLabel(). '</label>';
        }
        $input .= '<input type="file"';
        foreach ($this->getAttribute() as $key => $value){
            $input .= ' '. $key. '="'. $value. '"';
        }
        $input .= '>';
        return $input;
    }
}

?>
