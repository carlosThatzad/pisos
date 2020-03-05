<?php


namespace Rentit;


use Rentit\Models\DB;

abstract class Controller implements VIew
{
    protected $request; //significa que el controlador a su vez esta compuesto de una request una relaxion de composicion
 function __construct($request)
 {

$this->request=$request;//definir como parte de la estructura del controlador la request

 }

    function error($string){
    //echo 'Metodo no existe';
        $this->render(['error'=>$string],'error');

        //  throw new \Exception("[ERROR::]:Non existyyyent method");

}
  public function render(?array $dataview=null,?string $template=null)
    {
        if ($dataview) {

            $data=$dataview;
            extract($data);
        }

            if ($template == "") {
                include 'Templates/' . $this->request->getController() . '.tpl.php';
            }else{
                include 'Templates/' . $template . '.tpl.php';
            }

    }

    }

