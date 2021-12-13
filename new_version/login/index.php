<?php
header("Content-Type: text/html; charset=utf-8");

session_start();
unset($_SESSION['userid']);

$server = 'mysql:host=mysql5.inf5.de; dbname=db450157_21; charset=utf8';
$username = 'db450157_21';
$password = 'gk2e+KPby13k';

try {
    $connection = new PDO($server, $username, $password);
} catch (PDOException $e) {
    print $e->getMessage();
}
?>
<!DOCTYPE html>

<html lang="de-DE">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="icon" href="../res/index.png" />
    <script src="../js/jquery-3.6.0.js"></script>
    <title>Lehrer-Login - Praktikumsdatenbank HoLa</title>
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <header class="container-fluid pt-3 pb-4">
                <div>
                    <h1 class="text-white fw-bold">
                        <a class="text-reset text-decoration-none" href="../index.php">Praktikumsdatenbank der Hohen Landesschule Hanau</a>
                    </h1>
                </div>
                <div>
                    <h2 class="text-white">
                        Willkommen in der Verwaltung der Praktikumsdatenbank der Hohen Landesschule Hanau.
                    </h2>
                </div>
            </header>
            <main class="container-fluid p-3">
                <form class="grid needs-validation" accept-charset="utf-8" id="login" action="index.php" method="POST" novalidate>
                    <fieldset class="p-3">
                        <legend class="fw-bold fs-5">Bitte melden Sie sich mit Ihrem Benutzernamen und Ihrem Passwort an.</legend>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="user">Benutzername:</label>
                                <div class="input-group has-validation">
                                    <img class="input-group-text rounded-start" src="../res/person-fill.svg">
                                    <input class="rounded-end form-control" type="text" name="user" id="user" placeholder="Geben Sie bitte Ihren Benutzernamen ein." required autocomplete="off">
                                    <div class="invalid-feedback">
                                        Geben Sie bitte Ihren Benutzernamen ein.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="password">Passwort:</label>
                                <div class="input-group has-validation">
                                    <img class="input-group-text rounded-start" src="../res/key-fill.svg">
                                    <input class="rounded-end form-control" type="password" name="password" id="password" placeholder="Geben Sie bitte Ihr Passwort ein." required>
                                    <div class="invalid-feedback">
                                        Geben Sie bitte Ihr Passwort ein.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-auto">
                                <input class="input-group-text btn btn-outline-primary rounded-pill" type="submit" name="submitLogin" id="submitLogin" value="Anmelden">
                            </div>
                        </div>

                        <div class="pt-3">
                            <?php
                            if (isset($_POST['submitLogin'])) {

                                $user = htmlspecialchars($_POST['user']);
                                $password = htmlspecialchars($_POST['password']);

                                $sqlQuery = 'SELECT teacherPw, firstPwChanged, teacherID FROM Teacher WHERE userName = "' . $user . '"';
                                $query = $connection->prepare($sqlQuery);
                                $query->execute();
                                $output = $query->fetchAll(PDO::FETCH_NUM);

                                $savedHash = $output[0][0];

                                if (password_verify($password, $savedHash)) {
                                    $_SESSION['userid'] = $user;
                                    $_SESSION['teacherid'] = $output[0][2];

                                    if (password_needs_rehash($savedHash, PASSWORD_DEFAULT)) {
                                        $hash = password_hash($password, PASSWORD_DEFAULT);
                                        $sqlQuery = "UPDATE Teacher set teacherPW = '$hash' WHERE userName = '$user'";
                                        $query = $connection->prepare($sqlQuery);
                                        $query->execute();
                                    }

                                    if ($output[0][1] == 1) {
                                        $_SESSION['changePwFirst'] = "";
                                        echo '<meta http-equiv="refresh" content="0.5; URL=../administrate.php">';
                                    } else {
                                        $_SESSION['changePwFirst'] = 1;
                                        echo '<meta http-equiv="refresh" content="0.5; URL=../changePassword.php">';
                                    }
                                } else {
                                    $_SESSION['userid'] = "";
                                    echo "Benutzername oder Passwort falsch!";
                                }
                            }
                            ?></div>
                    </fieldset>
                </form>
                <script>
                    (function() {
                        'use strict'

                        var forms = document.querySelectorAll('.needs-validation')

                        Array.prototype.slice.call(forms)
                            .forEach(function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (!form.checkValidity()) {
                                        event.preventDefault()
                                        event.stopPropagation()
                                    }

                                    form.classList.add('was-validated')
                                }, false)
                            })
                    })()
                </script>
            </main>
        </div>
        <footer class="container-fluid bg-light pt-3">
            <div class="grid">
                <div class="row text-center fs-6">
                    <div class="col">
                        <p class="fw-bold">Kontakt</p>
                        <hr />
                        <p>
                            Schreiben Sie uns gerne eine E-Mail unter: <br />
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
                        <p class="fw-bold">Benutzername oder Passwort vergessen?</p>
                        <hr />
                        <p>Bitte wenden Sie sich in diesem Fall an <br /> unseren Support (siehe Kontakt).</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>