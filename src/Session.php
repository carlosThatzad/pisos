<?php


namespace Rentit;


class Session
{
static function init(){
    session_start();
}
//seteamos el valor y luego le devolvemos
//si fuese user cargamos en la session todos los valores
static function set($key,$value){
    if(!isset($_SESSION[$key])){
        $_SESSION[$key]=$value;
    }
}
static function get($key){
    if(isset($_SESSION[$key])){
        return $_SESSION[$key];
    }
}
static function destroy(){
    session_destroy();
}

}