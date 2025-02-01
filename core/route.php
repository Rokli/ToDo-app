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
        "method" => "login"
    ],
    "/contact" => [
        "controller" => "MainController",
        "method" => "contact"
    ],
    "/register" => [
        "controller" => "RegisterController",
        "method" => "register"
    ],
    "/login/exit" => [
        "controller" => "AuthController",
        "method" => "exit"
    ]
];
?>