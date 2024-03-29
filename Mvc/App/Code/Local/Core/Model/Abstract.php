<?php

class Core_Model_Abstract
{
    protected $_data = [];
    protected $_resourceClass = '';
    protected $_modelClass = '';
    protected $_collectionClass = '';
    protected $_resource = null;
    protected $_collection = null;
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
    }
    public function setResourceClass($resourceClass)
    {
    }
    public function setCollectionClass($collectionClass)
    {
    }
    public function setId($id)
    {
        return $this->_data[$this->getResource()->getPrimaryKey()] = $id;
    }
    public function getId()
    {
        return isset($this->_data[$this->getResource()->getPrimaryKey()]) ? $this->_data[$this->getResource()->getPrimaryKey()] : "";
    }
    public function getResource()
    {
        return new $this->_resourceClass();
    }
    public function getCollection()
    {
        // return new $this->_collectionClass();
        $collection = new $this->_collectionClass();
        $collection->setResource($this->getResource());
        $collection->setModelClass($this->_modelClass);
        $collection->select();
        return $collection;
    }
    public function getTableName()
    {
    }
    public function __set($key, $value)
    {
    }
    public function __get($key)
    {
    }
    public function __unset($key)
    {
    }
    public function getData($key = null)
    {
        return $this->_data;
    }
    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }
    public function addData($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }
    public function removeData($key = null)
    {
        if (isset($this->_data[$key])) {
            unset($this->_data[$key]);
        }
        return $this;   
    }
    public function save()
    {
        $this->_beforeSave();
        $this->getResource()->save($this);
        $this->_afterSave();
        return $this;
    }
    public function load($id, $column = null)
    {
        $this->_data = $this->getResource()->load($id, $column);
        return $this;
    }
    public function delete()
    {
        if ($this->getId()) {
            $this->getResource()->delete($this);
        }
        return $this;
    }
    public function camelCase2UnderScore($str, $separator = "_")
    {
        if (empty($str)) {
            return $str;
        }
        $str = lcfirst($str);
        $str = preg_replace("/[A-Z]/", $separator . "$0", $str);
        return strtolower($str);
    }
    public function __call($method, $args)
    {
        $name = $this->camelCase2UnderScore(substr($method, 3));
        return isset($this->_data[$name])
            ? $this->_data[$name]
            : '';
    }
}
