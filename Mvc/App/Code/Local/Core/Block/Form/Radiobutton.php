<?php

class Core_Block_Form_Radio extends Core_Block_Form_Abstract {
    public function toHtml()
    {
        $input = '';
        if ($this->getLabel() && $this->getId()){
            $input .= '<label>'. $this->getLabel(). '</label>';
        }
        $options = $this->getOptions();
        foreach ($options as $value => $label) {
            $input .= '<input type="radio" id="' . $this->getId() . '_' . $value . '" name="' . $this->getName() . '" value="' . $value . '">';
            $input .= '<label for="' . $this->getId() . '_' . $value . '">' . $label . '</label>';
        }
        return $input;
    }
}
?>
