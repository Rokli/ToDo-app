<?php 
return [
    "/home" => [
        "controller" => "MainController",
        "method" => "home"
    ],
    "/login" => [
        "controller" => "AuthController",
        "method" => "login"
    ],
    "/login/auth" => [
        "controller" => "AuthController",
        "method" => "authorization"
    ],
    "/contact" => [
        "controller" => "MainController",
        "method" => "contact"
    ],
];
?>