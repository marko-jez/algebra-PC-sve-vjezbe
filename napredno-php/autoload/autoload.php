<?php

spl_autoload_register(function($imeKlase) {
  $pocetniDirektorij = __DIR__ . '/src/';
  $putanja = str_replace('\\', '/', $imeKlase);
  $file = $pocetniDirektorij . $putanja . '.php';

  if(file_exists($file)) {
    require $file;
  }
});