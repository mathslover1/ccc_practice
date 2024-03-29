<?php
class View_ProductList
{
    public $rowObj;
    public function __construct()
    {
        $obj = new Model_Abstract();
        $query = $obj->getQueryBuilder()->select("ccc_product", "*");
        $result = $obj->getQueryExecutor()->execute($query);
        $rows = $obj->getQueryExecutor()->FetchAssoc($result);
        $this->rowObj = ($rows);
    }
    public function createTable()
    {
        $table = '<div class="box">
                 <div class="container">
                    <div class="title">Product Information
                    <a href="index.php?action=add"><button type="submit" name="btn_add" class="ins">Add</button></a>
                    </div>
                    <div class="content">';
        $table .= '<table border="2px">
                        <tr><th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product SKU</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>delete</th>
                        </tr>';
        foreach ($this->rowObj as $data) {
            $table .=
                "<tr>
                            <td class='column'>" . $data->getproduct_id() . "</td>
                            <td class='column'>" . $data->getproduct_name() . "</td>
                            <td class='column'>" . $data->getsku() . "</td>
                            <td class='column'>" . $data->getcat_id() . "</td>
                            <td><div class='btn'><a href='index.php?action=edit&id=" . $data->getproduct_id() . "'><button class='upd'>Edit</button></a></td></div>
                            <td><div class='btn'><a href='index.php?action=delete&id=" . $data->getproduct_id() . "'><button class='dlt'>Delete</button></a></td></div>
                        </tr>";
        }
        $table .= '</table>';
        $table .= ' </div>
                </div>
                </div>';
        return $table;
    }
    public function toHtml()
    {
        $form = $this->createTable();
        return $form;
    }
}
