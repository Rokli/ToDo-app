<?php

require_once(__DIR__ . "/Controller.php");

class MainController extends Controller{
    public function home(){
        return $this->renderPage("accordion.html");
    }
    public function contact(){
        return $this->renderPage("contact.html");
    }
}
?>