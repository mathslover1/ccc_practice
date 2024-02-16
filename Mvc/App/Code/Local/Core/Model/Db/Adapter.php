<?php

class Core_Model_Db_Adapter{
    public $config = [
        
        "hostname"=> "localhost",
        "username"=> "root",
        "password"=> "",
        "dbname"=> "ccc_practice",
        
];
    public $connect = null;
    public function connect() {
        if (is_null($this->connect)) {
        $this->connect = mysqli_connect($this->config["hostname"],
                                        $this->config["username"],
                                        $this->config["password"],
                                        $this->config["dbname"]);
        }
    }
    public function fetchAll($query){

    }
    public function fetchPairs($query){

    }
    public function fetchOne($query){

    }
    public function fetchRow($query){

    }
    public function insert($query){

    }
    public function update($query){

    }
    public function delete($query){

    }
    public function query($query){
        
    }

}

?>