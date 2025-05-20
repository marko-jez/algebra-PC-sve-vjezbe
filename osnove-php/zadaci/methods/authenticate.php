<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authenticate</title>
</head>
<body>
    <h1>Authenticate</h1>
    <hr>
    <?php
        $isPostEmpty = empty($_POST);
        var_dump($isPostEmpty);
    ?>
    <h2>Username: <?php echo $isPostEmpty ? '-' : $_POST['username']; ?></h2>
    <h2>Username: <?php echo $isPostEmpty ? '-' : $_POST['password']; ?></h2>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = htmlspecialchars(trim($_POST['username']));
        $password = $_POST['password'];

        if(empty($username) && empty($password)) {
            echo "Upiši sva polja";
        } else {
            echo "Username: " . $username . "<br>";
            echo "Password: " . $password;
        }
    } 
    
    ?>
</body>
</html>