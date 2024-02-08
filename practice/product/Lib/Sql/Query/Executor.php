<pre>
<?php
class Lib_Sql_Query_Executor extends Lib_Sql_Connection
{
    public function execute($sql)
    {
        try {
            return $this->connect()->query($sql);
        } catch (Exception $e) {

            var_dump($e->getMessage());
        }
    }
    public function fetchAssoc($result)
    {
        $data = new Model_Data_Collection();
        while ($row = $result->fetch_assoc()) {
            $data->addData($row);
        }
        if (count($data->getData()) == 0) {
            return null;
        }
        return count($data->getData()) > 1 ? $data->getData() : $data->getData()[0];
    }
    public  function fetchRow($result)
    {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }
}
?>