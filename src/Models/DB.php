<?php


namespace Rentit\Models;
use Illuminate\Database\Capsule\Manager as Capsule;
class DB{


    public function  __construct()
    {
        $capsule = new Capsule();
        $capsule->addConnection(
        [
            'driver'=>DBDRIVER,
            'host'=>DBHOST,
            'database'=>DBNAME,
            'username'=>DBUSER,
            'password'=>DBPASS,
            'charset'=>'utf8',
            'collation'=>'utf8_unicode_ci',
            'prefix'=>''
        ]

        );
//una vez hecha la conexion modificamos los parametros para poder usar modelos
        $capsule->setAsGlobal();//definir como variable local
        $capsule->bootEloquent();//Que arranque el trabajo del ORM para poder hacer uso de los modelos

    }




}
