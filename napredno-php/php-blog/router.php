<?php

class Router {
  private array $routes = [];

  public function addRoute(string $path, string $controller) {
    $this->routes[$path] = $controller;
  }

  public function route(string $currentUri) {
    if(array_key_exists($currentUri, $this->routes)) {
        require $this->routes[$currentUri];
    } else {
        require 'view/404.view.php';
    }
  } 
}



