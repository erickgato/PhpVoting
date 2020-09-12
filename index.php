<?php
// Include the config file to setup env variables
include_once 'config/env.php';
require __DIR__ . '/vendor/autoload.php';
//Set UTF-8 as global encode
mb_internal_encoding('UTF-8');

use CoffeeCode\Router\Router;

$router = new Router(PJURL);
$router->namespace("App\Controllers");

$router->group(null);
$router->get("/", "Login:index");
$router->post("/", "Login:receiveData");

$router->group("cadastro");
$router->get("/", "SingUp:index");
$router->post("/", "SingUp:receiveData");

$router->group("explorar");
$router->get("/", "App:explore");
$router->get("/enquete/{id}", "App:survey");

/** 
 * error group
 */
$router->group("oops");
$router->get("/{errcode}", "Error:trow");

$router->dispatch();
if ($router->error())
    $router->redirect("/oops/{$router->error()}");
