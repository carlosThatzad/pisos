<?php

define('DBDRIVER','mysql');
define('DBHOST','localhost');
define('DBNAME','carlosapp');
define('DBUSER','root');
define('DBPASS','linuxlinux');

function getToken(){
    $token=md5(uniqid(rand(),true));
$_SESSION['token']=$token;
$_SESSION['token_time']=time();
return $token;
}