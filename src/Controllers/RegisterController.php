<?php


namespace Rentit\Controllers;


use Rentit\Controller;

class RegisterController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
        //var_dump($this->request->getParams());

    }
    public function index()
    {
        $data = ['title' => 'register'
        ];
        $this->render($data);

        $template = $this->request->getParams();
        $data = $this->request->getParams();
        $this->render([]);

    }
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
    public function register()
    {
        if (isset($_POST)) {
            $params = [':usuari' => $_POST['usuario'],
                ':pasw' => $_POST['pas']];
            $sql = 'INSERT INTO user (username,password) VALUES ("'.$_POST['usuario'].'","'.$_POST['pas'].'"); ';

            $db=$this->getDB();
            $result = $this->query($db,$sql);



            //preparara la insercion si es que ha salido bien

           header('Location:/base'); //redireccion a espaciouser}
        }

    }
    public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }
}