<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $cookieName = 'email';
        $cookieValue = 'b@b.com';
        $expirationDate = time() + 86400;
        $path = '/';

        setcookie($cookieName, $cookieValue, $expirationDate, $path);
        print_r($_COOKIE);
    ?>
</body>
</html>