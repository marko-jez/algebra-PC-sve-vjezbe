<?php

class Router {
  private array $routes = [];

  public function addRoute(string $path, string $controller) {
    $this->routes[$path] = $controller;
  }

  public function route() {
    $currentUri = $_SERVER['REQUEST_URI'];

    if(array_key_exists($currentUri, $this->routes)) {
        require $this->routes[$currentUri];
    } else {
        require 'view/404.view.php';
    }
  } 
}



