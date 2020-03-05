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
        $data = ['title' => 'signup'
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

        $stmt = $this->query($db, "SELECT * FROM users", null);
        $result = $this->row_extracts_first($stmt);
        var_dump($result);
        return $result;
    }

    public function getResults()
    {
        $db = $this->getDB();
        //$db->query();

        $stmt = $this->query($db, "SELECT * FROM users", null);
        $result = $this->row_extracts($stmt);
        var_dump($result);
        return $result;
    }


    public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }
}