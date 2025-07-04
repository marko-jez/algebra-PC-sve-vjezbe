<?php

require 'core/Database.php';
$db = Database::getInstance();

require_once 'functions.php';

require 'Router.php'; // učitavam Router.php u kojem je samo klasa Router
$router = new Router; // stvaram objekt iz klase Router

require 'routes.php'; // učitavam routes.php u kojem je zasad array i petlja koja prolazi kroz taj array
                      // i dodijeljuje rutu npr. '/' kao $path i 'controllers/homeController.php' kao $controller
                      // i odmah to proslijeđuje u addRoute metodu u klasi Router i stavlja u svojstvo $routes
$currentUri = $_SERVER['REQUEST_URI'];
$router->route($currentUri);     // u napravljeni objekt $router pristupam metodi ->route() i pozivam ju i sve se izvršava u njoj
                      // ta metoda(funkcija) gleda trenutni URL (npr. '/articles')
                      // i ako postoji u $this->routes, učitava pripadajući kontroler

  

 