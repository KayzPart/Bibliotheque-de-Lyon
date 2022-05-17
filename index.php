<?php 
require_once __DIR__ . '/vendor/autoload.php';
require_once  __DIR__ .'/vendor/altorouter/altorouter/AltoRouter.php';

// Création d'une instance de AltoRouter
$router = new AltoRouter();

$router->setBasePath('/php/Bibliotheque-de-Lyon');

// Routes

// Homepage / Liste des livres
$router->map('GET', '/', 'ControllerBook#listAllBook', 'homepage');

// Direction formulaire Admin
$router->map('GET', '/connectAdmin', 'ControllerConnexion#connectAdmin');

// Direction formulaire User 
$router->map('GET', '/connectUser', 'ControllerConnexion#connectUser');

// Espace admin
$router->map('POST', '/spaceAdmin', 'ControllerConnexion#connexionAdmin');

// Espace User
$router->map('POST', '/spaceUser', 'ControllerConnexion#connexionUser');

// Réservation livre 
$router->map('GET', '/userReserv/[i:id_book]', 'ControllerBooked#resaBook', 'formulaire');

$router->map('GET', '/book/[i:id_book]', '#readBook', 'ficheBook');

// Afficher category
$router->map('GET', '/book', 'ControllerBook#Show', 'afficher' );

// Afficher recherche 
$router->map('GET', '/book', 'ControllerBook#searchBook', 'afficherSearch');

// Afficher condition
$router->map('GET', '/book', 'ControllerBook#ShowCondi', 'afficherCondi' );

// Afficher genre
$router->map('GET', '/book', 'ControllerBook#ShowGender', 'afficherGender' );

// Formulaire ajout livre
$router->map('POST', '/book', 'ControllerBook#newBook');



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
