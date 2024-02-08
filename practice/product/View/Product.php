<pre><?php
        class View_Product
        {
            public $newobj;
            public function __construct()
            {
                $obj = new Model_Request();
                $id = ($obj->getGetData('id'));
                $obj = new Model_Abstract();
                $sql = $obj->getQueryBuilder()->select("ccc_product", "*", ["product_id" => $id]);
                $test = $obj->getQueryExecutor()->execute($sql);
                $data = $obj->getQueryExecutor()->fetchAssoc($test);
                $this->newobj = $data;
            }
            public function createForm($newObj)
            {
                $form = '<style>
                    .form-container {
                        width: 60%;
                        margin: 0 auto;
                        background-color: #f4f4f4;
                        padding: 20px;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }

                    .form-group {
                        margin-bottom: 15px;
                    }

                    label {
                        display: block;
                        font-weight: bold;
                    }

                    input[type="text"],
                    select {
                        width: 100%;
                        padding: 8px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    }

                    input[type="radio"] {
                        margin-right: 5px;
                    }
                </style>';
                $form .= '<div class="form-container">';
                $form .= '<form action="" method="POST" class="product-form">';
                $form .= '<div class="form-group">';
                if ($newObj) {
                    $form .= $this->creteTextField('ccc_product[product_name]', "Product Name:", $newObj->getproduct_name(), 'product_name', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->creteTextField('ccc_product[sku]', "Sku:", $newObj->getsku(), 'sku', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->createRadioButtons('ccc_product[product_type]', "Product Type:", array(
                        'simple' => 'Simple',
                        'bundle' => 'Bundle',
                    ), $newObj->getproduct_type(), '');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->createDropdownField('ccc_product[cat_id]', "Category:", array(
                        '1' => 'Bar & Game Room',
                        '2' => 'Bedroom',
                        '3' => 'Decor',
                        '4' => 'Dining & Kitchen',
                        '5' => 'Lighting',
                        '6' => 'Living Room',
                        '7' => 'Mattresses',
                        '8' => 'Office',
                        '9' => 'Outdoor',
                    ), $newObj->getcat_id(), 'category', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->creteTextField('ccc_product[manufacturer_cost]', "Manufacturer Cost:", $newObj->getmanufacturer_cost(), 'manufacturer_cost', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->creteTextField('ccc_product[shipping_cost]', "Shipping Cost:", $newObj->getshipping_cost(), 'shipping_cost', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->creteTextField('ccc_product[total_cost]', "Total Cost:", $newObj->gettotal_cost(), 'total_cost', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->creteTextField('ccc_product[price]', "Price:", $newObj->getprice(), 'price', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->createDropdownField('ccc_product[status]', "Status:", [
                        'enabled' => 'Enabled',
                        'disabled' => 'Disabled',
                    ], $newObj->getstatus(), 'status', 'form-control');
                    $form .= '</div>';
                } else {
                    $form .= $this->creteTextField('ccc_product[product_name]', "Product Name:", '', 'product_name', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->creteTextField('ccc_product[sku]', "Sku:", '', 'sku', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->createRadioButtons('ccc_product[product_type]', "Product Type:", array(
                        'simple' => 'Simple',
                        'bundle' => 'Bundle',
                    ), '', '');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->createDropdownField('ccc_product[cat_id]', "Category:", array(
                        '1' => 'Bar & Game Room',
                        '2' => 'Bedroom',
                        '3' => 'Decor',
                        '4' => 'Dining & Kitchen',
                        '5' => 'Lighting',
                        '6' => 'Living Room',
                        '7' => 'Mattresses',
                        '8' => 'Office',
                        '9' => 'Outdoor',
                    ), '', 'category', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->creteTextField('ccc_product[manufacturer_cost]', "Manufacturer Cost:", '', 'manufacturer_cost', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->creteTextField('ccc_product[shipping_cost]', "Shipping Cost:", '', 'shipping_cost', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->creteTextField('ccc_product[total_cost]', "Total Cost:", '', 'total_cost', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->creteTextField('ccc_product[price]', "Price:", '', 'price', 'form-control');
                    $form .= '</div>';
                    $form .= '<div class="form-group">';
                    $form .= $this->createDropdownField('ccc_product[status]', "Status:", [
                        'enabled' => 'Enabled',
                        'disabled' => 'Disabled',
                    ], '', 'status', 'form-control');
                    $form .= '</div>';
                }
                $form .= '<div class="form-group">';
                $form .= $this->creteSubmitBtn('Submit');
                $form .= '</div>';
                $form .= '</form>';
                $form .= '</div>';
                return $form;
            }

            public function creteTextField($name, $title, $value = '', $id = '', $class = '')
            {
                return '<span> ' . $title . ' </span><input id="' . $id . '" class="' . $class . '" type="text" name="' . $name . '" value="' . $value . '">';
            }

            public function createDropdownField($name, $title, $options = array(), $selected = '', $id = '', $class = '')
            {
                $dropdown = $title;
                $dropdown .= '<select id="' . $id . '" class="' . $class . '" name="' . $name . '">';

                foreach ($options as $key => $value) {
                    $selectedAttr = ($key == $selected) ? 'selected="selected"' : '';
                    $dropdown .= '<option value="' . $key . '" ' . $selectedAttr . '>' . $value . '</option>';
                }

                $dropdown .= '</select>';
                return $dropdown;
            }

            public function createRadioButtons($name, $title, $options = array(), $selected = '', $id = '')
            {
                $radios = '';
                $radios .= $title;
                $radios .= "<br>";
                foreach ($options as $value => $label) {
                    $checkedAttr = ($value == $selected) ? 'checked="checked"' : '';
                    $radios .= '<label for="' . $id . '_' . $value . '">' . $label . '</label>';
                    $radios .= '<input type="radio" id="' . $id . '_'  . '" name="' . $name . '" value="' . $value . '" ' . $checkedAttr . '>';
                }

                return $radios;
            }

            public function creteSubmitBtn($title)
            {
                return '<input type="submit" class="btn btn-primary" name="submit" value="' . $title . '">';
            }

            public function toHTML()
            {
                return $this->createForm($this->newobj);
            }
        }
        ?>