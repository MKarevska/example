<?php
class DB {
    private static $cont=NULL;
    private function __construct() {
        
    }

    public static function getConnect(){
        if(self::$cont==null){
    $paramersPath=(ROOT.'/config/db_paramers.php'); 
    $paramers=include($paramersPath);
    $dsn='mysql:host=fdb24.awardspace.net;dbname=2914283_mari;charset=utf8';
    self::$cont=new PDO($dsn,$paramers['username'],$paramers['password']);
        }
    return self::$cont;
    }
}
