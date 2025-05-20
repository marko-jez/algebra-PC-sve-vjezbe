<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    <h1>Session</h1>
    <hr>
    <?php
    

    session_start();

    $_SESSION['email'] = 'a@a.com';

    var_dump($_SESSION);

    foreach($_SESSION as $key => $value) {
        echo "Ključ je: " . $key .  ", a vrijednost je: " . $value . "<br>";
    }

    session_destroy();

    print_r($_SESSION);
    $_SESSION = array();
    echo "<br><br>";

    print_r($_SESSION);
    

    ?>
</body>
</html>