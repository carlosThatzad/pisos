<?php


namespace Rentit\Controllers;


use Rentit\Controller;
use Rentit\Models\Publication;
use Rentit\Session;

class DashboardController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
    }
    public function index(){
        $data=['title'=>'dashboard',
            ];
        $this->render($data);


    }



}