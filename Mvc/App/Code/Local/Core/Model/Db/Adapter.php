<?php

class Core_Model_Db_Adapter
{
    public $config = [

        "hostname" => "localhost",
        "username" => "root",
        "password" => "",
        "dbname" => "ccc_catalog",

    ];
    public $connect = null;
    public function connect()
    {
        if (is_null($this->connect)) {
            $this->connect = mysqli_connect(
                $this->config["hostname"],
                $this->config["username"],
                $this->config["password"],
                $this->config["dbname"]
            );
        }
        return $this->connect;
    }
    public function fetchAll($query)
    {
        $row = [];
        $sql = mysqli_query($this->connect(),$query);
        while($_row = mysqli_fetch_assoc($sql))
        {
            $row[] =$_row;
        }
        return $row;
    }
    public function fetchPairs($query)
    {
    }
    public function fetchOne($query)
    {
    }
    public function fetchRow($query)
    {   
        $row = [];
        $this->connect();
        $result = mysqli_query($this->connect(), $query);
        while ($_row = mysqli_fetch_assoc($result)) {
            $row = $_row;
        }
        return $row;
    }
    public function insert($query)
    {
        // print_r($query);die;
        $this->connect();
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            return mysqli_insert_id($this->connect());
        } else {
            return FALSE;
        }
    }
    public function update($query)
    {
        // echo "<pre>";
        // print_r($query);
        $this->connect();
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            return mysqli_insert_id($this->connect());
        } else {
            return FALSE;
        }
    }
    public function delete($query)
    {
        $this->connect();
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            return mysqli_insert_id($this->connect());
        } else {
            return FALSE;
        }
    }
    public function query($query)
    {
    }
}
