<?php 
require_once('lib/GetLaravelEnv.php');
$getLaravelEnv = new GetLaravelEnv();
$config_app = $getLaravelEnv->get_envconfig('app');
print_r($config_app);
exit();
