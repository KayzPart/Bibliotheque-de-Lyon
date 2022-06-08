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

// Déconnection de l'admin
$router->map('GET', '/deconnectAdmin', 'ControllerConnexion#deconnectAdmin');

$router->map('GET', '/deconnectUser', 'ControllerConnexion#deconnectUser');

// Direction formulaire User (par défaut)
$router->map('GET', '/connectUser', 'ControllerConnexion#connectUser');

// Espace User
$router->map('POST', '/verifUser', 'ControllerUser#connexionUser');
$router->map('GET', '/spaceUser', 'ControllerUser#space');

// Espace User => Modification info compte
$router->map('GET|POST', '/userModif/[i:id_user]', 'ControllerUser#userSpace', 'usermodif');

// Espace user -> recherche livre -> selection -> Réserver
$router->map('POST', '/validatebooking', 'ControllerReserv#bookings');
// Affichage sur userReserv de l'history des réservations
$router->map('GET', '/userReserv', 'ControllerReserv#viewHistory');


// Espace admin
$router->map('POST', '/verifAdmin', 'ControllerAdmin#connexionAdmin');
$router->map('GET', '/spaceAdmin', 'ControllerAdmin#space');

// Inscription nouvel Adhérant
// Direction formulaire
$router->map('GET|POST', '/registrationUser', 'ControllerUser#spaceInscripUse', 'formNewUse');

// Redirection vers le book selectionner
$router->map('GET', '/book/[i:id_book]', 'ControllerBook#readBook', 'book');

// Ajout commentaire 
$router->map('GET', '/book/addcom', 'ControllerComment#comment');

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
