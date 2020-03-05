<?php


namespace Rentit\Controllers;


use Rentit\Controller;
use Rentit\Models\User;
use Rentit\Session;

final class UserController extends Controller
{
public function __construct($request)
{
    parent::__construct($request);
}
public function index(){
    $data=['title'=>'User',
            'users'=>User::all()];
        $this->render($data);


}
    private function create_user($email,$passwd,$name,$lastname){
       //comprobarsi existe o no

        $user=User::create([
            'email'=>$email,
            'password'=>$passwd,
            'name'=>$name,
            'lastname'=>$lastname
            ]);

        return $user;
    }
    public function login(){
    $this->render(null,"login");
    }
    public function register(){
        $this->render(null,"register");

}
   /* public function login () {

        $data = ['title'=>'login'];
        $this->render($data, "login");

    }*/

  /*  public function signup () {

        $data = ['title'=>'Registrar-me'];
        $this->render($data, "signup");

    }*/


    public function signup()
    {

        if (!empty($_REQUEST['email']) &&
            !empty($_REQUEST['passwd']) &&
            !empty($_REQUEST['passwd2']) ) {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_EMAIL);
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_EMAIL);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $passwd1 = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_STRING);
            $passwd2 = filter_input(INPUT_POST, 'passwd2', FILTER_SANITIZE_STRING);

            if ($passwd1 == $passwd2) {
                $passwdhash = password_hash($passwd1,PASSWORD_ARGON2I);
                try {
                    $user = $this->create_user($email, $passwdhash,$name,$lastname);
                    header('location:/');
                } catch (\PDOException $e) {
                    $this->error($e->getMessage());
                }
            } else {
                $this->error("Password does not match");
            }
        }
        $this->error("Fill the form");
    }
public function signin(){

   /* if($this->verifyToken($_POST['token'],600)){*/
        if(!empty($_REQUEST['email'])&& !empty($_REQUEST['passwd'])){
            $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);

            $passwd_str=filter_input(INPUT_POST,'passwd',FILTER_SANITIZE_STRING);

            $user=User::where('email','=',$email)->get()->first();

            if($user!=null && password_verify($passwd_str,$user->password)==true){
                Session::set('user',$user);
                Session::set('logged',true);
                header('Location:/');
            }else{
                $this->error("Password or user not valid");
            }
        }else{
            $this->error("Fill the form");
        }

  /*  }else{
        $this->error("Token not valid");
    }*/

}
    public function logout(){
        Session::destroy();
        header('Location:/');
    }

    public function getSingleResult()
    {
        // TODO: Implement getSingleResult() method.
    }

    public function getResults()
    {
        // TODO: Implement getResults() method.
    }
  public function json(array $dataview)
    {
        // TODO: Implement json() method.
    }
}