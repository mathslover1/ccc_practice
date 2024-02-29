<?php

class Mage
{
    private static $registry = [];
    private static $baseDir = "C:/xampp\htdocs\Internship\Mvc";
    private static $baseUrl = "http://localhost\Internship\Mvc";
    protected static $_singleTon =null;

    public static function  init()
    {
        $frontController = new Core_Controller_Front();
        $frontController->init();
    }
    public static function getModel($className)
    {
        $className = ucwords(str_replace('/', '_Model_', $className), '_');
        return new  $className;
    }
    public static function getBlock($className)
    {
        $className = ucwords(str_replace('/', '_Block_', $className), '_');
        return new  $className;
    }
    public static function getSingleton($className)
    {
        if (isset(self::$_singleTon[$className])) {
            return  self::$_singleTon[$className];
        } else {
            return self::$_singleTon[$className] = self::getModel($className);
        }
    }
    public static function register($key, $value)
    {
    }
    public static function registry($key)
    {
    }
    public static function getBaseDir($subDir = null)
    {
        if ($subDir) {
            return self::$baseDir . "/" . $subDir;
        }
        return self::$baseDir;
    }
    public static function getBaseUrl($subUrl = null)
    {
        if ($subUrl) {
            return self::$baseUrl . "/" . $subUrl;
        }
        return self::$baseUrl;
    }
}
