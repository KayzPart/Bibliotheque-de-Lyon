<?php 
require_once __DIR__ . '/vendor/autoload.php';
require_once  __DIR__ .'/vendor/altorouter/altorouter/AltoRouter.php';

// Création d'une instance de AltoRouter
$router = new AltoRouter();

$router->setBasePath('/php/Bibliotheque-de-Lyon');

// Routes
$router->map('GET', '/', 'ControllerBook#listAllBook', 'homepage');

$router->map('GET', '/connexion', 'ControllerConnexion#connect');

$router->map('POST', '/[a:session]', 'ControllerConnexion#selectSession');

$router->map('GET', '/spaceAdmin', 'ControllerAdmin#connexionAdmin');

// $router->map('POST', '/session/[i:id_user]', 'ControllerConnexion#session', 'user');

$router->map('POST', '/spaceUser', 'ControllerUser#userArea');

$router->map('POST', '/spaceAdmin', 'ControllerAdmin#connexionAdmin');


$match = $router->match();

if($match){
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller; 
   
    switch($action){
        case 'selectSession':
            foreach($_POST as $key => $value){
                $match['params'][$key] = $value;
            }
            var_dump($match['params']);
            break;
    }
    if(is_callable(array($obj, $action))){
         call_user_func_array(array($obj, $action), $match['params']);
    }
}

