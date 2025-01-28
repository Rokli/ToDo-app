<?php
require_once(__DIR__ . '/Controller.php');
class AuthController extends Controller{
    public function login(){
        return $this->renderPage("login.php");
    }
}
?>