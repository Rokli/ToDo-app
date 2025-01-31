<?php

require_once(__DIR__ . "/Controller.php");


class MainController extends Controller{

    public function home(){
        if(isset($_COOKIE["auth_token"]))
            $this->renderDefaultPage("accordion.html.twig",["isToken" => true]);
        else 
            $this->renderDefaultPage("accordion.html.twig",["isToken" => false]);
    }
    public function contact(){
        if(isset($_COOKIE["auth_token"]))
            $this->renderDefaultPage("contact.html.twig",["isToken" => true]);
        else 
            $this->renderDefaultPage("contact.html.twig",["isToken" => false]);
    }
}
?>