<?php

spl_autoload_register(function ($class) {
    if (in_array($class, ['PDO', 'Exception', 'Throwable']) || class_exists($class, false)) {
        return;
    }

    $file = __DIR__ . '/backend/Controller/' . $class . '.php';
    if (file_exists($file)) {
        require_once($file);
    } else {
        echo "Файл не найден: " . $file . "<br>";
    }
});
require_once("backend/Route.php");

$route = new Route();
$route->route();