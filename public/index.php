<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use Config\Router;

$router = new Router;
$router->addRoute('/','HomeController','index'); 
$router->addRoute('/404', 'ErrorController', 'notFound');
$router->addRoute('/ajouter', 'TaskController', 'addtask');
$router->addRoute('/tache', 'TaskController', 'task');
$router->addRoute('/modifier', 'TaskController', 'editTask');
$router->addRoute('/supprimer', 'TaskController', 'deleteTask');
$router->handleRequest();

