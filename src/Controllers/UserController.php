<?php


namespace Rentit\Controllers;
use Rentit\DB;

use Rentit\Controller;
use Rentit\User;

class UserController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
        //var_dump($this->request->getParams());

    }

    public function index()
    {
        $data = ['title' => 'USER'
        ];
        $this->render($data);

        $template = $this->request->getParams();
        $data = $this->request->getParams();
        $this->render([]);

    }

    /* public function render($dataview=null)
     {
         var_dump($dataview);

     }*/

    public function getSingleResult()
    {

        $db = $this->getDB();
        //$db->query();

        $stmt = $this->query($db, "SELECT * FROM user", null);
        $result = $this->row_extracts_first($stmt);
        var_dump($result);
        return $result;
    }

    public function getResults()
    {
        $db = $this->getDB();
        //$db->query();

        $stmt = $this->query($db, "SELECT * FROM user", null);
        $result = $this->row_extracts($stmt);
        var_dump($result);
        return $result;
    }

    public function user()
    {
        if (isset($_POST)) {
            $params = [':usuari' => $_POST['usuario'],
                ':pasw' => $_POST['pas']];
            $sql = 'SELECT * FROM user WHERE username="'.$_POST['usuario'].'" AND password="'.$_POST['pas'].'"';
            $db=$this->getDB();
            $result = $this->query($db,$sql);

            $resultado=$this->row_extracts($result);
        print_r($resultado);


            if (!empty($resultado)) {
                session_start();
                $_SESSION['sesiones'] = $_POST['usuario'];

                header('location:/base');
            } else {
                header('location:/user');
            }
        }

    }
public function list(){
        $user=User::find(['id'=>'1']);
        var_dump($user);
}

    public
    function json(array $dataview)
    {
        // TODO: Implement json() method.
    }
}