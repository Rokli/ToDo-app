<?php
require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . "/../Models/User.php");

class AuthController extends Controller{
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = new User();
            $user->setLogin( $_POST['login']);
            $user->setPassword($_POST['password']);
            $user->save();

        }
        return $this->renderPage("login.php");
    }
}
?>