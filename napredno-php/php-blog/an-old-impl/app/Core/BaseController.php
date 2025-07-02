<?php

namespace App\Core;

use \App\Core\Database;

abstract class BaseController {
  protected $db;

  public function __construct() {
    $this->db = Database::getInstance()->getConnection();   
  }

  protected function render($view, $data = []) {
    extract($data);
    ob_start();
    include __DIR__ . "/../Views/{$view}.php";
    $content = ob_get_clean();

    include __DIR__ . "/../Views/layouts/main.php";
  }

  protected function redirect($url) {
    header("Location: " . "https://localhost:8000/" . $url);
  }
}