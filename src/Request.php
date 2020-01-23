<?php


namespace Rentit;


class Request
{
    private $controller;
    private $action;
    private $method;
    private $params=array();//suele ser un array
    protected $arrURI;

    //hacer geters and setters ya que necesitarmeos funciones publicas para acceder
    //metodos publicos nos permiten acceder al metodos privados
    function __construct()
    {
    //el constructor debe construir la consulta o objeto
        $requestString=htmlentities($_SERVER['REQUEST_URI']); //requestString es una variable temporal que obtiene la variable server con  la url que se solicita
        //htmlentitites solo para mas seguiridad
        $this->arrURI=explode('/',$requestString);
        //separa en un array cada vez que encuentra el delimitador en este acaso '/'
        array_shift($this->arrURI);//desplaza la uri en una sola posicion
        $this->extractURI();
        //ar_dump($this->arrURI);
       // die;
    }
    private function extractURI(){
        //rellenara los geters and seters
        $length=count($this->arrURI);
        switch($length){
            case 1:
                if($this->arrURI[0]=="" ){ //si el array de la url es vacio mete lo que hay por defecto
                    $this->setController('default');
                }
                else{//en caso contrario mete lo que hay
                    $this->setController($this->arrURI[0]);
                }
                $this->setAction('index');

                break;
            case 2:
                $this->setController($this->arrURI[0]);
                if($this->arrURI[1]==""){
                    $this->setAction('index');
                }else {
                    $this->setAction($this->arrURI[1]);
                }

                break;

           default:
                //mayor que dos
                $this->setController($this->arrURI[0]);
                $this->setAction($this->arrURI[1]);


                $this->Params();//tiene que establecer los parametros


              /*  $this->setMethod($this->arrURI[2]);
                $this->setController($this->arrURI[0]);*/

                break;



        }
$this->setMethod(htmlentities($_SERVER['REQUEST_METHOD']));




    }
private function Params(){
        if($this->arrURI!=null){
            $arr_length=count($this->arrURI);
            if($arr_length>2){
                //si es mayor que dos significa que no ha habido ninguna transformacion ya que todos los casos contemplan que existan dos
                array_shift($this->arrURI);//miramos por la izquierda
                array_shift($this->arrURI);
                $arr_length=count($this->arrURI);
                if($arr_length%2==0){
                    //me interesa que sea par porque siempre iran clave y valor
                    for($i=0;$i<$arr_length;$i++){
                        if($i%2==0){
                            $arr_k[]=$this->arrURI[$i];//con esto lo que haremos será llenar de clave el array porque estos son pares
                        }else{
                            $arr_v[]=$this->arrURI[$i];//aqui se guardaran los valores que tendran posicion impar
                        }
                    }
                    $res=array_combine($arr_k,$arr_v);
                    $this->setParams($res);

                }
                else{
                    $this->setParams(null);
                    //si no ocurre el array asociativo no disponible
                }
            }
        }

    //la funcion es setear parametros sea null o no
}


    public function getController()
    {
        return $this->controller;
    }


    public function setController($controller): void
    {
        $this->controller = $controller;
    }


    public function getAction()
    {
        return $this->action;
    }


    public function setAction($action): void
    {
        $this->action = $action;
    }

    public function getMethod()
    {
        return $this->method;
    }


    public function setMethod($method): void
    {
        $this->method = $method;
    }


    public function getParams()
    {
        return $this->params;
    }


    public function setParams($params): void
    {
        $this->params = $params;
    }

}