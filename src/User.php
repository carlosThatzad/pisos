<?php


namespace Rentit\Models;


use Illuminate\Database\Eloquent\Model;
use Rentit\Session;

class User extends Model
{
    protected static $table= 'users';
    protected $fillable=['name','password','rol','email'];

    private $username;
    private $password;
    private $id;


public function _construct($username , $id,$password)
{
    $this->setUsuari($username);
    $this->setContrasenya($password);
    $this->setIdTipus($id);



}

    static function userData ($id = null) {

        if ($id == null) { $id = Session::get('id'); }
        $user = User::where('id', $id) -> get() -> first();
        return $user;

    }


public function is_client(){

}


}