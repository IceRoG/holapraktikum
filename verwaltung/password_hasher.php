<!DOCTYPE html>
<html lang="de-DE">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passwort-Hasher</title>
</head>

<body>
    <header id="header">
        <h1>Praktikumsdatenbank der Hohen Landesschule Hanau</h1>
    </header>
    <div id="login">
        <form accept-charset="utf-8" id="searchbar" action="password_hasher.php" method="POST">
            <input type="password" name="password" id="password" required><br>
            <input type="submit" name="submitLogin" id="submitLogin" value="Passwort Hashen!">
        </form>
        <?php
        if (isset($_POST['submitLogin'])) {
            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            echo $hash;
        }
        ?>
    </div>
</body>

</html>