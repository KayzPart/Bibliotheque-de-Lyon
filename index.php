<?php 
require_once __DIR__ . '/vendor/autoload.php';
require_once  __DIR__ .'/vendor/altorouter/altorouter/AltoRouter.php';

// Création d'une instance de AltoRouter
$router = new AltoRouter();

$router->setBasePath('/projet/Bibliotheque-de-Lyon');

// Routes

// Homepage / Liste des livres
$router->map('GET', '/', 'ControllerBook#listAllBook', 'homepage');

// Formulaire de contact
$router->map('POST', '/spaceUser', 'ControllerUser#contactForm', 'contactForm');

// Direction formulaire Admin
$router->map('GET', '/connectAdmin', 'ControllerConnexion#connectAdmin');

// Direction formulaire User (par défaut)
$router->map('GET', '/connectUser', 'ControllerConnexion#connectUser');

// Espace User
$router->map('POST', '/spaceUser', 'ControllerConnexion#connexionUser');

// Espace admin
$router->map('POST', '/spaceAdmin', 'ControllerConnexion#connexionAdmin');



// Réservation livre 
$router->map('GET', '/userReserv/[i:id_book]', 'ControllerBooked#resaBook', 'formulaire');

$router->map('GET', '/book/[i:id_book]', 'ControllerBook#readBook');


// *** Formulaire ajout livre => Les routes
$router->map('POST', '/bookF', 'ControllerBook#newBook');

// *** Direction formulaire =>  Afficher category
$router->map('GET', '/bookF', 'ControllerBook#Show', 'afficher' );
// *** Direction formulaire => Afficher condition
$router->map('GET', '/bookF', 'ControllerBook#ShowCondi', 'afficherCondi' );
// *** Direction formulaire => Afficher genre
$router->map('GET', '/bookF', 'ControllerBook#ShowGender', 'afficherGender' );





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

