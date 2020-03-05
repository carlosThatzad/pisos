<?php
    ini_set('display_errors','On');
    require __DIR__.'/vendor/autoload.php';
require __DIR__.'/config.php';

//    session_start();

    use Rentit\App;
    use Rentit\Session;

    Session::init();

    $token=getToken();
    App::run();//llamada estatica a la clase app