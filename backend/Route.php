<?php

class Route{
    public function route($request){
        if($request == "/home") {
            require_once("templates/header.html");
            require_once("templates/accordion.html");
            require_once("templates/footer.html");
        }
    }
}
?>






