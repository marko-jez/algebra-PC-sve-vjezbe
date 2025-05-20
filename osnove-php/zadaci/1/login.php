<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php 
        include 'obrazac.php';
    ?>
    
    <div>
        <?php 
            $ime = 'Marko';
            $prezime = 'Jeza';
            $full_name = $ime . " " . $prezime;
            $full_name= "$ime $prezime";
            echo $full_name;
            echo "<br>";

            $godine = 20;

            echo $ime . " ima " . $godine . " godina ";

            $je_li_musko = true;
            
            //ovo je if statement, ispisuje različite stringove ovisno o vrijednosti varijable $je_li_musko
            #ovo je drugi primjer komentara
            /* i 
            zatvaramo 
            ga sa */
            if ($je_li_musko == true) {
                echo $ime . " je muško" ;
            } else {
                echo $ime . " je žensko";
            }
            echo "<br>";

            define('PI', 3.14);

            echo 'Pi je: ' . PI;

            echo "<br>";
            $varijabla_a = "A";
            echo "Varijabla a je:  $varijabla_a";

            echo "<br>";
            
            $a = 10;
            $b = $a;
            $a = 3;
            
            //echo $a . " je isto kao i " . $b;

            if ($a == $b) {
                echo "Isti su brojevi";
        
            } else {
                echo "nisu to isti brojevi";
            }

        ?>
    </div>
</body>
</html>