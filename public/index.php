<?php
session_start();
require '../app/Utility/DataBase.php';
require '../app/Controllers/MainController.php';
require '../app/Controllers/HomeController.php';
require '../app/Controllers/ContactController.php';
require '../app/Controllers/AboutController.php';
require '../app/Controllers/PostController.php';
require '../app/Controllers/UserController.php';
require '../app/Controllers/AdminController.php';

// Variable contenant les routes dispo
const AVAIABLE_ROUTES = [
    'home'=>[
        'action' => 'renderHome',
        'controller' => 'HomeController'
    ],
    'about'=>[
        'action' => 'render',
        'controller' => 'MainController'
    ],
    'contact'=>[
        'action' => 'render',
        'controller' => 'MainController'
    ],
    'post'=>[
        'action' => 'renderPost',
        'controller' => 'PostController'
    ],
    'login'=>[
        'action' => 'renderUser',
        'controller' => 'UserController'
    ],
    'register'=>[
        'action' => 'renderUser',
        'controller' => 'UserController'
    ],
    'admin'=>[
        'action' => 'renderAdmin',
        'controller' => 'AdminController'
    ],
    '404'=>[
        'action' => 'render',
        'controller' => 'ErrorController'
    ],
];

// initiatilisation des variables
$page = 'home';
$controller;
$subPage=null;
// s'il y a un param GET page, on le stock dans la var page sinon on redirige vers home
if(isset($_GET['page']) && !empty($_GET['page'])){    
    $page = $_GET['page'];
    if(!empty($_GET['subpage'])){
        $subPage = $_GET['subpage'];        
    }
}else{
    $page = 'home';     
}

// Si la page demandée fait partie de notre tableau de routes, on la stocke dans la variable controller
// sinon on redirige vers le controller ErrorController
if(array_key_exists($page,AVAIABLE_ROUTES)){
    $controller = AVAIABLE_ROUTES[$page]['controller'];
    $controllerAction = AVAIABLE_ROUTES[$page]['action'];
}else{
    $controller = 'ErrorController';
}

$pageController = new $controller();
// On alimente la propriété view du controller avec le nom de la page demandée.
$pageController->setView($page);

// // On alimente la propriété subPage du controller avec le nom de la sous-page demandée. S'il n'y en à pas, elle vaudra simplement null
$pageController->setSubPage($subPage);

// On appelle la méthode du controller demandée
$pageController->$controllerAction();


