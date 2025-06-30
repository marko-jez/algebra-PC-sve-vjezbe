<?php

$host = 'localhost';
$korisnik = 'root';
$lozinka = '';
$baza = 'videoteka';

/* $connection = mysqli_connect('localhost', 'root', '', 'videoteka');

if($connection == false) {
    die("Konekcija na bazu neuspješna: " . mysqli_connect_error());
}

$sqlUpit = "SELECT * FROM clanovi";

$rezultati = mysqli_query($connection, $sqlUpit);

while($row = mysqli_fetch_assoc($rezultati)) {
    echo $row['ime'] . " " . $row['prezime'] . "<br>";
} */


/* $host = 'localhost';
$korisnik = 'root';
$lozinka = '';
$baza = 'videoteka';

$connection = mysqli_connect('localhost', 'root', '', 'videoteka');

if(!$connection) {
    die("Neupsješna konekcija na bazu: " . mysqli_connect_error());
}

$sqlUpit = "SELECT * FROM filmovi";

$rezultatSqlUpita = mysqli_query($connection, $sqlUpit);

while($row = mysqli_fetch_assoc($rezultatSqlUpita)) {
    echo $row['naziv'] . ": " . $row['godina'] ."<br>";
}

mysqli_close($connection); */

/* $mysqliNacin = new mysqli('localhost', 'root', '', 'videoteka');

if($mysqliNacin->connect_error) {
    die("Konekcija na bazu neuspješna: " . $mysqliNacin->connect_error);
}

$msqlUpit = "SELECT * FROM clanovi";

$rezultati = $mysqliNacin->query($msqlUpit);

while($row = $rezultati->fetch_assoc()) {
    echo $row['ime'] . " " . $row['prezime'] . "<br>";
}

$mysqliNacin->close(); */

$mysqli = new mysqli('localhost', 'root', '', 'videoteka');

if($mysqli->connect_error) {
    die('Neuspješno');
}

$sqlUpit = "SELECT * FROM cjenik_posudbe";

$rezultati = $mysqli->query($sqlUpit);

while($row = $rezultati->fetch_assoc()) {
    echo $row['kategorija'] . ": " . $row['cijena'] . "<br>";
}

$mysqli->close();

