<?php 
require_once __DIR__ . '/vendor/autoload.php';
require_once  __DIR__ .'//AltoRouter.php';

// Création d'une instance de AltoRouter
$router = new AltoRouter();

$router->setBasePath('/php/library');

// Page d'accueil
$router->map('GET', '/', 'ControllerBook#listAllBook', 'homepage');
$router->map('GET', '/book/[i:id]/', 'ControllerBook#readBook', 'form');

$match = $router->match();

if($match){
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller; 
    if(is_callable(array($obj, $action))){
         call_user_func_array(array($obj, $action), array($match['params']));
    }
}