<?php
require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . "/../Models/User.php");

class AuthController extends Controller{
    public function login(){
        return $this->renderDefaultPage("login.html.twig");
    }
}
?>