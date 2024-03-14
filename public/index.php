<?php

require __DIR__.'/../vendor/autoload.php';
require "../helpers.php";

/**
 *  Loading Classes
 */
spl_autoload_register(function ($class) {
    $path=basePath("Framework/".$class.".php");
    if(file_exists($path)){
        require $path;
    }
});

// Instantiate The Router
$router = new Router();

// Get Routes
$routes = require basePath('routes.php');

// Get Current URI & Method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method);



