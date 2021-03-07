<?php
class Router {
    //Dyrjim masiva v tazi promenliva
    private $rorutes;
    //чрез Tazi funkciya shte dyrjiм masiva ж променливата $rorutes;  
    public function __construct() {
        $this->rorutes=require_once (ROOT.'/config/routes.php');
    }
    //tazi funkciya shte vzima zayavkata na potrebitelya ot adresnata lenta; 
    private function getURI(){
        if($_SERVER['REQUEST_URI']){
        $a=trim($_SERVER['REQUEST_URI'],'/');
         $param = explode('?', $a);
         $url= array_shift($param);
         $getparams= array_shift($param);
         return $url;
        };//vzimame tova koeto e vyvel potrebitelya v adresnata lenta;  
    }
    //tazi funkciya shte sravnyava shablona ot masiva v pyrvata funkciya i 
    //zayavkata ot potrebitelya vyv vtorata funkciya;
    public function run(){
    //trqbva da interirame masiva i da zapishem kliucha v edna promenliva
    
    $uri= $this->getURI();
    
    foreach ($this->rorutes as $uriPatern=>$path){
        //v tazi promenliva dyrjim shablona i triabva da sravnim uri s uriPatern(шаблона)
        
        if(preg_match("'$uriPatern'",$uri)){
        $internalPath= preg_replace("'$uriPatern'",$path,$uri);
        //tyrsim v uri
        //tyrsim shablona "'$uriPatern'"
        //tryabva da go zamenim s pytya 'news/index/$1'
        //hvani mi pytia i go razdeli spryamo naklonenata cherta
        
        $segments= explode('/',$internalPath);
        $controllerName=ucfirst(array_shift($segments)).'Controller';
        //tazi funkciq vzima pyrviya element na masiva i go zapisva v controllerName
        
        $methodName='method'.ucfirst(array_shift($segments));
        $paramers=$segments;
        $controllerPath=ROOT.'/controllers/'.$controllerName.'.php';
        
        if($controllerPath&&$methodName){
            require_once($controllerPath);
            $controllerObject=new $controllerName;
            //$result=$controllerObject -> $methodName($paramers);
            //predavame parametrite kato masiw w methodName v obekta controllerObject
            $result= call_user_func_array(array($controllerObject,$methodName), $paramers);
            if(!$result=NULL){                
                break;
                   }
        }
        }
    }
  }
}