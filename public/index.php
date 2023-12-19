<?php

require '../app/Utility/DataBase.php';
require '../app/Controllers/MainController.php';
require '../app/Controllers/HomeController.php';
require '../app/Controllers/ContactController.php';
require '../app/Controllers/AboutController.php';
require '../app/Controllers/PostController.php';
require '../app/Controllers/UserController.php';

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
        'action' => 'render',
        'controller' => 'MainController'
    ],
    'register'=>[
        'action' => 'renderRegister',
        'controller' => 'UserController'
    ],
    '404'=>[
        'action' => 'render',
        'controller' => 'ErrorController'
    ],
];

// initiatilisation des variables
$page = 'home';
$controller;
$itemId=null;
// s'il y a un param GET page, on le stock dans la var page sinon on redirige vers home
if(isset($_GET['page']) && !empty($_GET['page'])){    
    $page = $_GET['page'];
    if(!empty($_GET['id'])){
        $itemId = $_GET['id'];
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
$pageController->setView($page);
$pageController->setId($itemId);
$pageController->$controllerAction();


