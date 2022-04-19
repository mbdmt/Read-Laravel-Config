<?php

/**
 * 獲取Laravel config value
 * require_once('lib/GetLaravelEnv.php');
 * $getLaravelEnv = new GetLaravelEnv();
 * $config_val = $getLaravelEnv->get_envconfig('app');
 * print_r($config_val);
 */
class GetLaravelEnv
{
    /*
     * 建構函數
     */
    public $env_arr = [];
    public function __construct ()
    {
        
        $fn = fopen(dirname($_SERVER['DOCUMENT_ROOT']).'/.env',"r");
        while(! feof($fn))  {
        $result = fgets($fn);
        $result = str_replace("\r\n","",$result);
        $result = trim($result);
        $ignore = substr($result, 0,1);
        if($result!='' AND $ignore!='#'){
            $gevar = explode("=", $result,2);
            $this->env_arr[trim($gevar[0])]=trim($gevar[1]);
        } 
        }
        $GLOBALS['env_global_arr'] = $this->env_arr;
        fclose($fn);
    }

    /*
     * 取得config裡的參數
     * $name = 文件名 without .php
     */
    public function get_envconfig ($name)
    {
        return require_once(dirname($_SERVER['DOCUMENT_ROOT']).'/config/'.$name.'.php');
    }
}

function env($keyname='',$defaultval='') {
  global $env_global_arr;
  if($keyname){
    if(isset($env_global_arr[$keyname])){
        return $env_global_arr[$keyname];
    }else if($defaultval){
        return $defaultval;
    }
  }
}

?>
