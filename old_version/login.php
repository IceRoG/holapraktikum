<?php
header("Content-Type: text/html; charset=utf-8");

session_start();

$server = 'mysql:host=mysql5.inf5.de; dbname=db450157_21; charset=utf8';
$username = 'db450157_21';
$password = 'gk2e+KPby13k';

try {
    $verbindung = new PDO($server, $username, $password);
} catch (PDOException $e) {
    print $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="de-DE">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikumsdatenbank HoLa - Login</title>
</head>

<body>
    <header id="header">
        <h1>Praktikumsdatenbank der Hohen Landesschule Hanau</h1>
    </header>
    <div id="login">
        <h2>Willkommen in der Verwaltung der Praktikumsdatenbank der Hohen Landesschule Hanau </h2>
        <p>Bitte melden Sie sich mit Ihrem Benutzernamen und Ihrem Kennwort an.</p>
        <form accept-charset="utf-8" id="searchbar" action="login.php" method="POST">
            <label for="user">Benutzername (Nachname)</label>
            <input type="text" name="user" id="user" required><br>
            <label for="password">Kennwort</label>
            <input type="password" name="password" id="password" required><br>
            <input type="submit" name="submitLogin" id="submitLogin" value="Anmelden">
        </form>
        <?php
        if (isset($_POST['submitLogin'])) {

            $user = $_POST['user'];
            $password = $_POST['password'];

            $sqlQuery = 'SELECT teacherPw FROM Teacher WHERE teacherLastName = "' . $user . '"';
            $query = $verbindung->prepare($sqlQuery);
            $query->execute();
            $output = $query->fetchAll(PDO::FETCH_NUM);

            $savedHash = $output[0][0];

            if (password_verify($password, $savedHash)) {
                $_SESSION['userid'] = $user;
                echo "Erfolgreiche Anmeldung! User: " . $_SESSION['userid'];

                if (password_needs_rehash($savedHash, PASSWORD_DEFAULT)) {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $sqlQuery = 'UPDATE Teacher set teacherPW = "' . $hash . '" WHERE teacherLastName = ' . $user . '';
                    $query = $verbindung->prepare($sqlQuery);
                    $query->execute();
                }
            } else {
                echo "Passwort oder Benutzername falsch!";
            }
        }
        ?>
    </div>
</body>

</html>