<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use Config\Router;

$router = new Router;
$router->addRoute('/','HomeController','index'); 
$router->addRoute('/404', 'ErrorController', 'notFound');
$router->addRoute('/ajouter', 'TaskController', 'addtask');
$router->addRoute('/Taches', 'TaskController', 'allTask');
$router->handleRequest();
$title = 'My About Page';
include('header.php');
?>
    <div>la page contents</div>
<?php include('footer.php'); ?>

 