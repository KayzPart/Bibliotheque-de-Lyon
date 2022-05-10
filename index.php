<?php 
require_once __DIR__ . '/vendor/autoload.php';
require_once  __DIR__ .'/vendor/altorouter/altorouter/AltoRouter.php';

// Création d'une instance de AltoRouter
$router = new AltoRouter();

$router->setBasePath('/php/Bibliotheque-de-Lyon');

// Routes

// Homepage / Liste des livres
$router->map('GET', '/', 'ControllerBook#listAllBook', 'homepage');

// Connexion Admin/User
$router->map('GET', '/connexion', 'ControllerConnexion#connect');

// Selection de la session
$router->map('POST', '/[a:session]', 'ControllerConnexion#selectSession');

// Espace admin
$router->map('POST', '/spaceAdmin', 'ControllerAdmin#connexionAdmin');

// Espace User
$router->map('POST', '/spaceUser', 'ControllerUser#userArea');

// Réservation livre 
$router->map('GET', '/userReserv/[i:id_book]', 'ControllerBooked#resaBook', 'formulaire');

$router->map('GET', '/book/[i:id_book]', '#readBook', 'ficheBook');

$router->map('GET', '/book', 'ControllerBook#Show', 'afficher' );

$router->map('POST', '/book/create', 'ControllerBook#newBook','create');

// $router->map('POST', '/ajout/validate', 'ControllerBook#newBook');


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
        case 'connect':
            foreach($_POST as $key => $value){
                $match['params'][$key] = $value;
            }
            var_dump($match['params']);
            break; 
       
    }
    if(is_callable(array($obj, $action))){
         call_user_func_array(array($obj, $action), array($match['params']));
    }
}

