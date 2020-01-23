<?php


namespace Rentit\Controllers;


use Rentit\Controller;


final class DefaultController extends Controller
{
public function __construct($request)
{
    parent::__construct($request);


}
public function index(){


    $template=['template'=>'default'];
    $this->render($template);
    $data=['title'=>'default',
            'results'=>$this->getResults()

        ];
    $this->render($data);
    $results=$this->getResults();

    //echo $results;
}

  public function render(array $dataview=null,string $template=null)
    {
        if ($dataview) {
            extract($dataview);
            include 'src/Templates/' . $this->request->getController() . '.tpl.php';
            if ($template != "") {
                include 'src/Templates/' . $template . '.tpl.php';
            }
        }
   //   var_dump($dataview);
   // var_dump($template);

    }

    public function getSingleResult()
    {
        // TODO: Implement getSingleResult() method.
        $db=$this->getDB();
        //$db->query();

        $stmt=$this->query($db ,"SELECT * FROM user" , null );
        $result=$this->row_extracts_first($stmt);
        return $result;
    }

    public function getResults()
    {
        $db=$this->getDB();
 // $db->query();

    $stmt=$this->query($db ,"SELECT * FROM user" , null );
        $result=$this->row_extracts($stmt);
        return $result;
        // TODO: Implement getResults() method.
    }

    public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }

}