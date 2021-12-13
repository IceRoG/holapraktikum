<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
session_destroy();
?>
<!DOCTYPE html>

<html lang="de-DE">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="icon" href="res/index.png" />
    <script src="js/jquery-3.6.0.js"></script>
    <title>Logout - Praktikumsdatenbank HoLa</title>
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <header class="container-fluid pt-3 pb-4">
                <div>
                    <h1 class="text-white fw-bold">
                        <a class="text-reset text-decoration-none" href="index.php">Praktikumsdatenbank der Hohen Landesschule Hanau</a>
                    </h1>
                </div>
                <div>
                    <h2 class="text-white">
                        Logout erfolgreich!
                    </h2>
                </div>
            </header>
            <main class="container-fluid p-3 mt-5 text-center">
                <h3 class="fw-bold">Logout erfolgreich!</h3>
                <h4>
                    Sie haben sich erfolgreich ausgeloggt.<br /><a href="login.php">Hier</a> können Sie sich erneut einloggen.
                </h4>
            </main>
        </div>
        <footer class="container-fluid bg-light pt-3">
            <div class="grid">
                <div class="row text-center fs-6">
                    <div class="col">
                        <p class="fw-bold">Kontakt</p>
                        <hr />
                        <p>
                            Schreib uns gerne eine E-Mail unter: <br />
                            <a href="mailto:praktikumsdb@hola-gymnasium.de">praktikumsdb@hola-gymnasium.de</a>
                        </p>
                    </div>
                    <div class="col">
                        <p class="fw-bold">Ersteller</p>
                        <hr />
                        <div class="row">
                            <p class="col">Marc Pfeiffer</p>
                            <p class="col">Maximilian Partin</p>
                        </div>
                        <div class="row">
                            <p class="col">Roman Grigoriev</p>
                            <p class="col">Marcel Maier</p>
                        </div>
                    </div>
                    <div class="col">
                        <p class="fw-bold">Lehrer-Login</p>
                        <hr />
                        <a href="login.php">Hier geht's zum Lehrer-Login!</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>