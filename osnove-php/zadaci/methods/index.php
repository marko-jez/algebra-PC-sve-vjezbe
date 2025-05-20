<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <h1>POST VARIJBLA</h1>

    <form action="authenticate.php" method="POST">
        <div>
            <label> Username:
                <input type="text" name="username">
            </label>
        </div>

        <label> Password:
            <input type="password" name="password">
        </label>
        <br>
        <input type="submit" name="password">
    </form>

    <?php
        var_dump($_POST);

        if(isset($_POST['username'])) {
            echo "Username: " . $_POST['username'];
        } else {
            echo "Username nije postavljen";
        }
    ?>
</body>
</html>