<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
</head>
<body>
<h1>Cookie</h1>
<hr>

<?php

$cookieName = 'email';
$cookieValue ='b@b.com';
$expirationTime =time() + 86400;
$path = '/';

setcookie($cookieName, $cookieValue, $expirationTime, $path);

print_r($_COOKIE);

echo "<br>";

setcookie($cookieName, '', time() - 3600, $path);
print_r($_COOKIE);
echo "pokušaj opet";
print_r($_COOKIE);

?>

</body>
</html>