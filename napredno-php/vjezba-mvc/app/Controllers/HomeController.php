<?php

namespace App\Controllers;

class HomeController {
  public function homePage() {
    view('home/index.view.php');
  }
}