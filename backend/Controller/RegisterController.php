<?php
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../Models/User.php");

class RegisterController extends Controller{
    public function register(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = new User();

            $user->setLogin( $_POST['login']);
            $user->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT));
            $token = bin2hex(random_bytes(32)); 
            $user->setAuthToken($token);

            $user->save();
            setcookie("auth_token", $token, time() + 86400 * 30, "/", "", true, true);
            header("Location: /home");
        }else{
            return $this->renderDefaultPage("register.html.twig");
        }
    }
}
?>