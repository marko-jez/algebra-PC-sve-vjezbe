<?php

/* $articles = [
  [
    "title" => "Moji hobiji",
    "body"=> "Moji hobiji su raznovrsni, volim programirati i baviti se sportom i puno drugih stvari"
  ],
  [
    "title" => "Moja hrana",
    "body"=> "Volim hranu, volim jesti i kuhati"
  ],
  [
    "title" => "Moje namirnice",
    "body"=> "Moje nadraže namirnice su banane, mlijeko, med"
  ]
]; */

$conn = $db->getConnection();
$stmt = $conn->prepare("SELECT * FROM clanci");
$result = $stmt->execute();
$articles = $stmt->fetchAll();


require 'views/articles.view.php';

