<?php

function dd($value) {
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}

function view($pathToView, $attributes) {
  extract($attributes);
  require "views/{$pathToView}";
}