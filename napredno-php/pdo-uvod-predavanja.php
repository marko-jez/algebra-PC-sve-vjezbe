<?php

$dbhost = 'localhost';
$korisnik = 'root';
$lozinka = '';
$baza = 'restoran';

try {
    $pdo = new PDO("mysql:host=$dbhost;dbname=$baza", $korisnik, $lozinka);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT * FROM jela");

    $stmt->execute();

    $svaJela = $stmt->fetchAll();
    foreach($svaJela as $jelo){
        foreach($jelo as $key => $value) {
        echo "$key: $value, ";
        }
        echo "<hr>";
    }

    while($row = $stmt->fetch()) {
        echo $row['naziv'] . ' ' . $row['cijena'] . "<br>";
    }
    
//ovdje cemo sad ici insertati u tablicu nove zapise    
$stmt = $pdo->prepare("INSERT INTO stolovi (broj) VALUES (:broj)"); 

$iznos = 8;

$stmt->bindParam(':broj', $iznos);
$stmt->execute();

    
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

