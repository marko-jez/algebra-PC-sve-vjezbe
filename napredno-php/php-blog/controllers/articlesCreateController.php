<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require __DIR__ . '/../functions.php';
  dd($_POST);
}

view('articles/create.php');