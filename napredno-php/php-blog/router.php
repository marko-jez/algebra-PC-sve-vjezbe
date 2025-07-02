<?php

require_once 'functions.php';
$currentUri = $_SERVER['REQUEST_URI'];

if($currentUri == '/') {
  require 'controllers/homeController.php';
} elseif ($currentUri == '/articles') {
  require 'views/articles.view.php';
} elseif($currentUri == '/articles-create') {
  require 'views/articles-create.view.php';
}