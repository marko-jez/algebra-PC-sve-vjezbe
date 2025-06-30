<?php

spl_autoload_register(function($imeKlase) {
  $pocetniDir = __DIR__ . '/src/';
  $putanja = str_replace('\\', '/', $imeKlase);
  $fajl = $pocetniDir . $putanja . '.php';

  if($fajl) {
    require $fajl;
  }
});
