# Read-Laravel-Config
Can read Laravel env and config setting for other programs. 
your php program path is here : 
public/test.php
public/lib/GetLaravelEnv.php

test.php :
$getLaravelEnv = new GetLaravelEnv();
$config_val = $getLaravelEnv->get_envconfig('app');
print_r($config_val);
