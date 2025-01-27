<?php

class Route{
    public function route($request){
        if($request == "/home") 
            $this->renderPage("templates/accordion.html");

        if($request == "/login") 
            $this->renderPage("templates/login.php");
        
        if($request == "/contact")
            $this->renderPage("templates/contact.html");
    }

    private function renderPage($body, $header = "templates/header.html",$footer = "templates/footer.html"){
        require_once($header);
        require_once($body);
        require_once($footer);
    }

}
?>






