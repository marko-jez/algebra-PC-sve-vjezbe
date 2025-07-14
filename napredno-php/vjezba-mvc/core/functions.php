<?php

function view($pathToView, $data = []) {
  extract($data);
  require __DIR__ . '/../app/Views/' . $pathToView;
}

function redirect($path) {
  header('Location: ' . $path);
  exit;
}