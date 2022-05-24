<?php 
require_once __DIR__ . '/vendor/autoload.php';
require_once  __DIR__ .'/vendor/altorouter/altorouter/AltoRouter.php';


define('ROOT', '/projet/Bibliotheque-de-Lyon');

// Création d'une instance de AltoRouter
$router = new AltoRouter();


$router->setBasePath(ROOT);


// Routes

// Homepage / Liste des livres
$router->map('GET', '/', 'ControllerBook#listAllBook', '/');

// Formulaire de contact
// $router->map('POST', '/spaceUser', 'ControllerUser#contactForm', 'contactForm');

// Direction formulaire Admin
$router->map('GET', '/connectAdmin', 'ControllerConnexion#connectAdmin');

// Direction formulaire User (par défaut)
$router->map('GET', '/connectUser', 'ControllerConnexion#connectUser');

// Espace User
$router->map('POST', '/verifUser', 'ControllerUser#connexionUser');
$router->map('GET', '/spaceUser', 'ControllerUser#space');

// Espace admin
$router->map('POST', '/verifAdmin', 'ControllerAdmin#connexionAdmin');
$router->map('GET', '/spaceAdmin', 'ControllerAdmin#space');

// Réservation livre 
$router->map('GET', '/userReserv/[i:id_book]', 'ControllerBooked#resaBook', 'formulaire');
$router->map('GET', '/book/[i:id_book]', 'ControllerBook#readBook', 'book');

// *** Formulaire ajout livre => Les routes
$router->map('POST', '/newBook', 'ControllerBook#newBook');
// *** Direction formulaire =>  Afficher category
$router->map('GET', '/bookF', 'ControllerBook#Show', 'afficher' );
// *** Direction formulaire => Afficher condition
$router->map('GET', '/bookF', 'ControllerBook#ShowCondi', 'afficherCondi' );
// *** Direction formulaire => Afficher genre
$router->map('GET', '/bookF', 'ControllerBook#ShowGender', 'afficherGender' );

// Update Book
$router->map('GET', '/update/[i:id_book]', 'ControllerBook#editBookForm', 'updateForm');



// Recherche 
$router->map('GET', '/search', 'ControllerBook#spaceSearch');
// Afficher recherche 
$router->map('GET', '/book', 'ControllerBook#searchBook', 'afficherSearch');

$match = $router->match();

if($match){
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller; 
   
    if(is_callable(array($obj, $action))){
         call_user_func_array(array($obj, $action), array($match['params']));
    }
} 
