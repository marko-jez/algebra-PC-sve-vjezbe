<?php

include('funkcije.php');

if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['rijec']) && isset($_POST['rijec'])) {
    $ime = htmlspecialchars($_POST['rijec']);
    if(mb_strlen($ime) > 1) {
      $contentsJson = file_get_contents('people.json');
      $people = json_decode($contentsJson);
      //$people[] = $ime;
      $people[] = [
        "ime" => $ime,
        "brojSlova" => brojSlova($ime),
        "sadrziA" => sadrziA($ime),
        "velikaSlova" => velikaSlova($ime),
        "malaSlova" => malaSlova($ime)
      ];
      $people_json = json_encode($people, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
      file_put_contents('people.json', $people_json);
      header('Location:' . '/');

    } else {
      die;
    }
    echo "Bok " . $ime;
    } else {
      echo "Niste poslali podatke";
    }
  