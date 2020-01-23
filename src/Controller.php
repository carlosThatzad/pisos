<?php


namespace Rentit;


abstract class Controller implements VIew,Model
{
    protected $request; //significa que el controlador a su vez esta compuesto de una request una relaxion de composicion
 function __construct($request)
 {

$this->request=$request;//definir como parte de la estructura del controlador la request

 }

    function error(){
    //echo 'Metodo no existe';
    throw new \Exception("[ERROR::]:Non existent method");

}
  public  function render(array $dataview=null,string $template=null)
    {
        if ($dataview) {
            extract($dataview);
            include 'Templates/' . $this->request->getController() . '.tpl.php';
            if ($template != "") {
                include 'Templates/' . $template . '.tpl.php';
            }
        }
    }
    function getDB(){
        $db=DB::singleton();
        return $db;
    }
    protected function query ($db,$sql,$params=null){
     try{
         $stmt =$db->prepare($sql);
         if($params){
             $res= $stmt->execute($params);

         }else{
             $res=$stmt->execute();

         }
         return $stmt;
     }catch(\PDOException $e){
             echo $e->getMessage();
         }

     }
     protected function row_extracts($stmt){
     $rows=$stmt->fetchAll(\PDO::FETCH_ASSOC);
     return $rows;
     }
    protected function row_extracts_first($stmt){
        $rows=$stmt->fetch(\PDO::FETCH_ASSOC);
        return $rows;
    }
    }
