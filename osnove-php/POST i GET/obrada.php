<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obrada podataka</title>
</head>
<body>
    <h1>Obrada podataka</h1>
    <hr>

    <?php
       $podaciIzPosta = empty($_POST);
       
       if(!$podaciIzPosta) {
            if(isset($_POST['ime']) && strlen($_POST['ime'] > 0 )) {
                echo "Ime je: " . $_POST['ime'];
        } else {
            echo "Ime nije postavljeno";
        }

        echo "<br>";

        if(!$podaciIzPosta) {
            if(isset($_POST['prezime']) && strlen($_POST['prezime'] > 0)) {
                echo "Prezime je: " . $_POST['prezime'];
            } else {
                echo "Prezime nije postavljeno";
            }
        }
    
    }

    ?>

    <h2>Drugi zadatak</h2>

    <?php
     
       if(empty($_GET)) {
         echo 'Nema podataka u GET varijabli.';
       } else {
         foreach($_GET as $key => $value) {
           if (strlen($value) > 0) {
             echo $key . ' : ' . $value . '<br>';
           } else {
             echo $key . ' nije postavljeno.' . '<br>';
           }
         }
       }
   
    ?>
</body>
</html>