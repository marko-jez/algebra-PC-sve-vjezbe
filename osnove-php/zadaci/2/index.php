<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varijable i konstante</title>
</head>
<body>
    <div>
        <?php 
        $cijeli_broj = 7;
        $decimalni_broj = 3.6;
        $tekst = 'Tekstualni zapis';
        $logicka_vrijednost = true;

        echo $cijeli_broj;
        echo "<br>";
        echo $decimalni_broj;
        echo "<br>";
        echo $tekst;
        echo "<br>";
        echo $logicka_vrijednost;
        echo "<br>";
        
        define('PI', 3.14);
        echo PI;
        echo "<br>";
        $a = 1;
        $b = &$a;
        $a = 2;

        echo 'a: ' . $a;
        echo "<br>";
        echo 'b: ' . $b;


        ?>
    </div>
    
</body>
</html>

