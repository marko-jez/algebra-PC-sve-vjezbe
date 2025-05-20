<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funkcije</title>
</head>
<body>
    <h1>Funkcije</h1>
    <hr>
    <?php
       
       function vratiText($text) {
        return $text;
       }

       $poruka = vratiText("Bok svima");
       echo $poruka;

    ?>
</body>
</html>