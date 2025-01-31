<?php
require_once(__DIR__ . '/../../vendor/autoload.php');
abstract class Controller {
    protected $loader;

    protected $twig;

    public function __construct(){
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../../templates"); 
        $this->twig = new \Twig\Environment($this->loader, [
            'cache' => false,
        ]);
        
    }
    public function renderDefaultPage($body,$data = [], $header = "header.html.twig",$footer = "footer.html.twig"){
        echo $this->twig->render($body, $data);
    }
}
?>