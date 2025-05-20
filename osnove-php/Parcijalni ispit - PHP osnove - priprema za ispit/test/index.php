<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcijlani ispit - PHP osnove</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php 
require('funkcije.php');
define('FILE_PATH', 'people.json');

?>

<h1>PHP osnove - parcijala</h1>
<hr>

<main class="main">
    <form action="obrada.php" method="POST">
        <label>Upišite riječ:
            <br>
            <input type="text" name="rijec" required>
        </label>
        <br><br>
        <input type="submit" value="pošalji">
    </form>

    <table border="1">
        <tr>
            <th>Ime</th>
            <th>Broj slova</th>
            <th>Sadrži li A</th>
            <th>Slova u velika</th>
            <th>Slova u mala</th>
        </tr>

        <?php 
        /* $contentsJson = file_get_contents(FILE_PATH);
        $people = json_decode($contentsJson);
        foreach($people as $person) {
            echo "<tr>";
                echo "<td>" . $person . "</td>";
                echo "<td>" . brojSlova($person) . "</td>";
                echo "<td>" . sadrziA($person) . "</td>";
                echo "<td>" . velikaSlova($person) . "</td>";
                echo "<td>" . malaSlova($person) . "</td>";
            echo "</tr>";
        } */

        $contentsJson = file_get_contents(FILE_PATH);
        $people = json_decode($contentsJson);
        foreach($people as $person) {
            echo "<tr>";
            foreach($person as $vrijednosti) {
                echo "<td>" . $vrijednosti . "</td>";
            }
            echo "</tr>";
        }
        ?>

    </table>
</main>


</body>
</html>
