<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operatori</title>
</head>
<body>
    
    <?php
    $a = 10;
    $b = 5;
    $c = "algebra";
    $d = "PHP";

    echo "Varijabla a: " . $a . "<br>";
    echo "Varijabla b: " . $b . "<br>";
    echo "Varijabla c: " . $c . "<br>";
    echo "Varijabla d: " . $d . "<br>";
    echo "<br>";
    echo "Zbrajanje: " . ($a + $b) . "<br>";
    echo "Oduzimanje: " . ($a - $b) . "<br>";
    echo "Množenje: " . ($a * $b) . "<br>";
    echo "Dijeljenje: " . ($a / $b) . "<br>";
    echo "Modul: " . ($a % $b) . "<br>";

    $f = $c . " - " . $d;
    echo "Konkatenacija: " . $f . "<br>";
    echo "<br>";

    $a += $b;

    echo "Kombinirani operator dodjele: " . $a . "<br>";
    
    echo "Var Dump";
    var_dump($a > $b);
    var_dump(10);
    var_dump(1.0);
    
    ?>

</body>
</html>