<?php

require_once("backend/Route.php");

$request = $_SERVER['REQUEST_URI'];

$request = strtok($request, '?');

$route = new Route();

$route->route($request);