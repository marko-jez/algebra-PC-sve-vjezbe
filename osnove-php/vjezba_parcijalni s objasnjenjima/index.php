<?php

define('FILE_PATH','words.json'); //tu smo definirali konstantu za putanju json datoteke
//zato jer se ta putanja nikada neće mijenjati i umjesto pisanja 'words.json' sada pisemo FILE_PATH

function izracunajBrojSlova($nekaRijec) {
    return strlen($nekaRijec); //ovo samo broji broj slova u riječi - kada budem zvao funkciju ću staviti argument $trimmedRijec
 }

 function izracunajBrojSamoglasnika($nekaRijec) { //kada pozovemo funkciju izracunajBrojSamoglasnika treba staviti i argument $trimmedRijec da se poveže
    $rijec = strtolower($nekaRijec); //svaka riječ koja bude upisana će biti malim slovima
    $samoglasnici = ['a', 'e', 'i', 'o', 'u']; //dodajem samoglasnike u array - još se neće koristi
    $slovaURijeci = preg_split('//u', $rijec); //preg_split sa '//u' znači da cijelu riječ razdvoji na slova i stavlja ih u array
    
    $brojSamoglasnika = 0; //posatavljam brojač na nulu
    foreach($slovaURijeci as $slovo) { //pretvorenu riječ u array sad provlačim kroz petlju, samo vrijednosti mi izvlači (to će biti slovo)
        if(in_array($slovo, $samoglasnici)) { //ovdje traži svako pojedino slovo u $samoglasnici arrayu
            $brojSamoglasnika++; //kada to pretraži, ako ima slovo npr. a, onda dodaje jedan broj u varijablu
        }
    }
    return $brojSamoglasnika; // ovdje završavam ovu funkciju i vraćam rezultat $brojSamoglasnika
 }

 function izracunajBrojSuglasnika($nekaRijec) {
    return izracunajBrojSlova($nekaRijec) - izracunajBrojSamoglasnika($nekaRijec);
 }     //broj slova u riječi - broj samoglasnika -> 4-2 = 2 suglasnika

 function citajJsonDatoteku($filePath) {
    $wordsJson = file_get_contents($filePath, false);
    $nizRijeci = json_decode($wordsJson);  //standardno dohvaćanje i dekodiranje json filea
    return $nizRijeci;                 
 }


 function dodajRijec($word, $nizRijeci) { //$word je lokaln varijabla, biti će povezana kada pozovemo funkciju i stavimo argument $trimmedRijec
    $r = htmlspecialchars($word);
    $trimmedRijec = trim($r); //ovo dvoje je dodao skroz na kraju svega, htmlspecialchars kao dodatna zaštita
    $trimmedRijec = str_replace(' ', '', $word); // "Ovdje se svi razmaci ' ' zamjenjuju s praznim stringom '', čime se uklanjaju iz riječi."
    if(strlen($trimmedRijec) === 0 ) return; //ne treba nam {} ako će upisati samo jednu vrijednost
    // ova linija nam govori da ako ništa nije upisano ili su samo razmaci upisani zaustaviti će tu funkciju odmah (return)

    $brojSlova = izracunajBrojSlova($trimmedRijec);
    //ovdje pozivam i ispisujem prvu funkciju

    $brojSamoglasnika = izracunajBrojSamoglasnika($trimmedRijec);
    //ovdje pozivam drugu funkciju

    $brojSuglasnika = izracunajBrojSuglasnika($trimmedRijec);
    //ovdje pozivam treću funkciju

    $nizRijeci[] = $trimmedRijec; //stvaramo lokalnu varijablu (zasad je bez vrijednosti, no kad pri  pozivanju funkcije dodajRijec stavimo u zagrade i $rijec, vrijednosti iz $rijeci će biti u $nizRijeci) i na kraj nje $trimmedRijec
    $rijeciJson = json_encode($nizRijeci);
    file_put_contents(FILE_PATH, $rijeciJson); //FILE_PATH je 'words.json' lokacija kako smo definirali gore konstantu na vrhu koda 
    header('Location: ' . $_SERVER['PHP_SELF']); //ovdje smo ovo dodali da kad stisnemo pošalji, da se odmah stranica refresha i da se vidi ispis rijeci u tablici
    //Location govori PHP da ide na url, a $_SERVER['PHP_SELF'] znači da ide na trenutni index.php url odnosno na koju lokaciju ce se odnositi
 }

$rijeci = citajJsonDatoteku(FILE_PATH); //ovdje smo pozvali funkciju gdje je json (nakon toga smo stavili sve to u varijablu $rijeci)



if($_SERVER['REQUEST_METHOD'] === 'POST') {
     echo "Ovo je POST metoda";
     echo "<br><br>";

$rijec = $_POST['rijec']; //kada submitam formu to šta upišem ide u $_POST varijablu a povežem ih s name atributom u formi ['rijec']

dodajRijec($rijec, $rijeci); //ovdje pozivam funkciju dodajRijec i dodijeljujem argument $rijec koji će svoju vrijednost dati varijabli $word u funkciji
 //isto tako, kasnije smo dodali $rijeci ovdje u funkciju, pa ce podaci iz $rijeci(znači ono šta smo izvadili iz jsona) biti u toj funkciji $nizRijeci
}



if($_SERVER['REQUEST_METHOD'] === 'GET'){
    echo "Ovo je GET metoda";
    echo "<br><br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vježba test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Vježba test</h1>
    <hr>

    <main class="main">
        <form action="index.php" method="POST">Upišite riječ
            <br>
            <label>
                <input type="text" name="rijec" required>
            </label>
            <br> <br>
            <input type="submit" value="pošalji">
        </form>
       
        

        <table border="1">
            <tr>
                <th>Riječ</th>
                <th>Broj slova</th>
                <th>Broj samoglasnika</th>
                <th>Broj suglasnika</th>
            </tr>

            <?php
            //pokrećem petlju i vrtim kroz $rijeci iz jsona sta smo izvadili
            foreach($rijeci as $rijecUNizu) { //samo vrijednost me zanima bez ključeva
                echo "<tr>";
                echo "<td>" . $rijecUNizu . "</td>";
                echo "<td>" . izracunajBrojSlova($rijecUNizu) . "</td>"; //pozivamo funkciju koja broji broj slova u riječi, a u zagradi je ta riječ iz petlje kroz koju treba proći
                echo "<td>" . izracunajBrojSamoglasnika($rijecUNizu) . "</td>";
                echo "<td>" . izracunajBrojSuglasnika($rijecUNizu) . "</td>";
                echo "</tr>";
            }          
            ?>
        </table>
    </main>

</body>
</html>