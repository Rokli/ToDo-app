<?php
require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . "/../Models/User.php");

class AuthController extends Controller{
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User();
            $user->setLogin($_POST["login"]);
            $user->setPassword($_POST["password"]);
    
            $authtoken = $user->checkAccount();  
            var_dump($authtoken);

            if (!$authtoken) {
                header("Location: /login");
                exit();  
            }
            setcookie("auth_token", "", time() - 3600, "/"); 
            setcookie("auth_token", $authtoken, time() + 86400 * 30, "/", "", true, true);

            header("Location: /home");
        }
    
        return $this->renderDefaultPage("login.html.twig");
    }
    
    public function exit(){
        setcookie("auth_token", "", time() - 3600, "/"); 
        $this->renderDefaultPage("accordion.html.twig",["isToken" => false]);
    }
}
?>