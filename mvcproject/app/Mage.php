<?php
class Mage{
    private static $registry;
    private static $baseDir ='C:/xampp/htdocs/Internship/mvcproject';
    public static function init()
    {
        $frontController = new Core_Controller_Front;
        $frontController->init();
    }

    public static function getModel($className)
    {
        // $array = explode("/", $modelName);
        // $a = array_map("ucfirst", $array);
        // $fullName = $a[0]."_Model_".$a[1];
        // // echo $fullName;
        // return new $fullName();

        $className = str_replace("/","_Model_", $className);
        $className = ucwords(str_replace("/","_",$className), '_');
        return  new $className();
    }
    public static function getBlock($className)
    {
        $className = str_replace("/","_Block_", $className);
        $className = ucwords(str_replace("/","_",$className), '_');
        return  new $className();
    }

    public static function getSingleton($className)
    {

    }

    public static function register($key, $value)
    {
        self::$registry[$key]=$value;
    }

    public static function registry($key)
    {

    }

    public static function getBaseDir($subDir = null)
    {
        if($subDir){
            return self::$baseDir .'/'. $subDir;
        }
        return self::$baseDir;
    }

}