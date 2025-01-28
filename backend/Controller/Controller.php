<?php
abstract class Controller {
    public function renderPage($body, $header = "header.html",$footer = "footer.html"){
        require_once(__DIR__ . "/../../templates/" . $header);
        require_once(__DIR__ . "/../../templates/" . $body);
        require_once(__DIR__ . "/../../templates/" . $footer);
    }
}
?>