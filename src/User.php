<?php


namespace Rentit;


use Rentit\Controllers\Entity;

class User extends Entity
{
    protected static $tableName= "user";
    private $username;
    private $password;
    private $id;


public function __construct($username , $id=2)
{
    $this->setUsuari($params["username"]);
    $this->setContrasenya($params["password"]);
    $this->setIdTipus($id);



}


}