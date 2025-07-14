<?php

namespace Core;

class Router {
  private $routes = [];

  public function addRoute($method, $path, $controller, $action) {
    $this->routes[] = compact('method', 'path', 'controller', 'action');
  }

  public function get($path, $controller, $action) {
    $this->addRoute('GET', $path, $controller, $action);
  }

  public function post($path, $controller, $action) {
    $this->addRoute('POST', $path, $controller, $action);
  }

 
  public function dispatch() {
    $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $method = $_SERVER['REQUEST_METHOD'];

    foreach($this->routes as $route) {
      if($route['method'] === $method && $route['path'] === $currentUri) {
        $controllerClass = 'App\\Controllers\\' . $route['controller'];
        $controller = new $controllerClass();
        return $controller->{$route['action']}();
      }
    }
    http_response_code(404);
    echo "404 - stranica nije pronađena.";
  }
}