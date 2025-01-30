<?php

require_once(__DIR__ . "/Controller.php");


class MainController extends Controller{

    public function home(){
        $this->renderDefaultPage("accordion.html.twig");
    }
    public function contact(){
        return $this->renderDefaultPage("contact.html.twig");
    }
}
?>