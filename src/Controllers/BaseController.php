<?php


namespace Rentit\Controllers;
use Rentit\Controller;


class BaseController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
     // var_dump($this->request->getParams());

    }
    public function  index(){
        $data=['menu'=>'Inicio',
                'menu1'=>'Home',
                'menu2'=>'Login',
                'products'=>$this->getResults(),
                'user'=>$_SESSION["sesiones"]


        ];

        $this->render($data);
        /*$template=$this->request->getParams();
$data=$this->request->getParams();
      */

    }

    public function getSingleResult()
    {
        $db=$this->getDB();
        //$db->query();

        $stmt=$this->query($db ,"SELECT * FROM productos" , null );
        $result=$this->row_extracts_first($stmt);
        return $result;
    }

    public function getResults()
    {
        $db=$this->getDB();
        // $db->query();

        $stmt=$this->query($db ,"SELECT * FROM productos" , null );
        $result=$this->row_extracts($stmt);
        return $result;
    }

    public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }
}

