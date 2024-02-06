<pre><?php
class Lib_Data_Object {
    public $_data = [];
    public function addData($row){
            $this->_data[] = new Data_Object($row);
    }

    public function getData() {
        return $this->_data;
    }
}
?>