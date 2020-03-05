<?php


namespace Rentit\Controllers;


use Rentit\Controller;
use Rentit\Models\Publication;


final class DefaultController extends Controller
{
public function __construct($request)
{
    parent::__construct($request);


}
public function index(){

$dataview=$this->allPublications();
$this->render($dataview);

    //echo $results;
}
private function allPublications(){
    $publications=Publication::all()->toArray();
return $publications;
}

  /*  public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }*/
}