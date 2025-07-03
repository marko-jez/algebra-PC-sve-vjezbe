<?php
require 'core/Database.php';
$db = Database::getInstance();

require_once 'functions.php';

$currentUri = $_SERVER['REQUEST_URI'];

if($currentUri == '/') {
  require 'controllers/homeController.php';
} elseif ($currentUri == '/articles') {
  require 'controllers/articlesController.php';
} elseif($currentUri == '/articles-create') {
  require 'controllers/articlesCreateController.php';
} else {
  require 'views/404.view.php';
}