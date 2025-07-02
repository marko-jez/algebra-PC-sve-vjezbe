<?php

namespace App\Controllers;

use \App\Core\Database;

class HomeController {

  public $db;

  public function __construct() {
 
  }

  public function render() {
     $data = [
      "ime" => "Franjo"
    ];
    extract($data);
    ob_start();
    include __DIR__ . '/../Views/home/index.php';
   
    $content = ob_get_clean();

    include __DIR__ . "/../Views/layouts/main.php";
  }
}