<?php
    ini_set('display_errors','On');
    require __DIR__.'/vendor/autoload.php';

    session_start();
    use Rentit\App;
    App::run();//llamada estatica a la clase app