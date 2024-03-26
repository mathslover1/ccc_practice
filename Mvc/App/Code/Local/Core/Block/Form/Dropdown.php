<?php
class Core_Block_Form_Dropdown extends Core_Block_Form_Abstract
{
    public function toHtml()
    {
        $input = '';

        if ($this->getLabel() && $this->getId()) {
            $input .= '<label for="' . $this->getId() . '">' . $this->getLabel() . '</label>';
        }

        $input .= '<select';
        foreach ($this->getAttribute() as $key => $value) {
            if (is_array($value)) {
                $value = implode(' ', $value);
            }
            $input .= ' ' . $key . '="' . $value . '"';
        }
        

        $input .= '>';

        $options = $this->getOptions();

        foreach ($options as $value => $label) {
            $option = Mage::getBlock('core/template')->getRender('option', [
                'value' => $value,
                'label' => $label
            ]);
            $input .= $option;
        }   
        $input .= '</select>';

        return $input;
    }
}
?>