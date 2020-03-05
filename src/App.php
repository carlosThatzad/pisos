<?php


namespace Rentit; //espacio de nombres

use Rentit\Models\DB;
//use http\Env\Request;

class App
{
    static function run()
    {
        //Activo la base de datos y le damos acceso a eloquent
        new DB();
    //añadimos un metodo estatico que llamamso en el index
        //LO primero que  deberiamos hacer sera construir las rutas

        //como hacer un archivo
        $routes =self::getRoutes();

       //hacer clase request
        $request = new Request();               //al construir el controlador ya herede un request con el uq pueda trabajar

                                                //una vez tenemos esto podemos llamar al controlador
        $controller=$request->getController();  //request es el array asociativo contodo lo que hemos metido en request
        $action=$request->getAction();

        try {
            if (in_array($controller, $routes)) {
                //si el controlador esta en la ruta lo alnzaremos

                $nameController = '\\Rentit\Controllers\\' . ucfirst($controller). 'Controller';

                $objCont = new $nameController($request);//nuevo controlador //CUANDO CONSTRUYA UN CONTROLADOR HEREDARA DE CONTROLLER Y DEFAULT YA QUE ES LO QUE LE APSAMOS


                if (is_callable([$objCont, $action])) {
                    call_user_func([$objCont,$action]);//es llamable la funcion
                } else {
                    //metodo no existe
                    call_user_func([$objCont, 'error']);
                }
            }
            else{
                throw new \Exception("[ERROR]:Ruta no definida");//espacio de \ es para decirle que no pertenece aqui
            }
           // $array_controller = self::getArrayController(); //extrae el controllador y el metodo devolviendo un array

        }
        catch (\Exception $e){
            echo $e->getMessage();
        }
    }

 /*   private function getArrayController(){
        $requestString=htmlentities($_SERVER['REQUEST_URI']);//separa la string en segmentos y por ello se convierte en array
        $requestArr=explode('/',$requestString);//explode divide en partes un String
        array_shift($requestArr);
        if($requestArr[0]==""){
            $controller="Default";
            $method="index";        //si no hubera metodo o controlador se deberia usar el default controller con el metodo index
        }
        else {
            $controller = ucfirst($requestArr[0]); //POn en mayusculas la primera

            $method = $requestArr[1];
        }
        return [$controller,$method];

    }*/

static function getRoutes():Array{
    //retorna un array con todas las rutas definidas

    $dir=__DIR__.'/Controllers';
    //haremos un puntero para listar todos loss documentos del directorio
    $handle=opendir($dir);//con el handle haremos un manejador de la funcionopen dir de Controller
    while(false!=($entry=readdir($handle))){//mientras pueda seguir recorruendo el directorioo
 //$entry guarda todas las entradas de la lectura del directorio la guardamos para no sobrescribir
        if($entry!="." && $entry!=".."){
            $routes[]=strtolower(substr($entry,0,-14));//para cargarnos el .php le restamos 4 posiciones
        }

    }

    return $routes;

}


}