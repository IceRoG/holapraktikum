<?php
header("Content-Type: text/html; charset=utf-8");

session_start();

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
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="icon" href="res/index.png" />
    <script src="js/jquery-3.6.0.js"></script>
    <title>Passwort ändern - Praktikumsdatenbank HoLa</title>
    <?php
    if ($_SESSION['userid'] == "") {
        echo '<meta http-equiv="refresh" content="0; URL=login/index.php">';
    }
    ?>
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
                        Passwort ändern
                    </h2>
                </div>
            </header>
            <main class="container-fluid p-3">
                <form class="grid needs-validation" accept-charset="utf-8" id="changePassword" action="changePassword.php" method="POST" novalidate>
                    <fieldset class="p-3">
                        <legend class="fw-bold fs-5">Hier können Sie Ihr Passwort ändern:</legend>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="passwordOld">altes Passwort:</label>
                                <div class="input-group has-validation">
                                    <img class="input-group-text rounded-start" src="res/key-fill.svg">
                                    <input class="rounded-end form-control" type="password" name="passwordOld" id="passwordOld" placeholder="Geben Sie bitte Ihr altes Passwort ein." required>
                                    <div class="invalid-feedback">
                                        Geben Sie bitte Ihr altes Passwort ein.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="passwordNew">neues Passwort:</label>
                                <div class="input-group has-validation">
                                    <img class="input-group-text rounded-start" src="res/key-fill.svg">
                                    <input class="rounded-end form-control" type="password" name="passwordNew" id="passwordNew" placeholder="Geben Sie bitte Ihr neues Passwort ein." required>
                                    <div class="invalid-feedback">
                                        Geben Sie bitte Ihr neues Passwort ein.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="passwordVerify">neues Passwort bestätigen:</label>
                                <div class="input-group has-validation">
                                    <img class="input-group-text rounded-start" src="res/key-fill.svg">
                                    <input class="rounded-end form-control" type="password" name="passwordVerify" id="passwordVerify" placeholder="Bestätigen Sie bitte Ihr neues Passwort ein." required>
                                    <div class="invalid-feedback">
                                        Bestätigen Sie bitte Ihr neues Passwort ein.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-auto">
                                <input class="input-group-text btn btn-outline-primary rounded-pill" type="submit" name="submitChange" id="submitChange" value="Passwort ändern">
                            </div>
                        </div>

                        <div class="pt-3">
                            <?php
                            if (isset($_POST['submitChange'])) {
                                $user = $_SESSION['userid'];
                                $passwordOld = $_POST['passwordOld'];
                                $passwordNew = $_POST['passwordNew'];
                                $passwordVerify = $_POST['passwordVerify'];

                                $sqlQuery = 'SELECT teacherPw FROM Teacher WHERE userName = "' . $user . '"';
                                $query = $connection->prepare($sqlQuery);
                                $query->execute();
                                $output = $query->fetchAll(PDO::FETCH_NUM);

                                $savedHash = $output[0][0];

                                if (password_verify($passwordOld, $savedHash)) {
                                    if ($passwordNew == $passwordVerify) {
                                        $hash = password_hash($passwordNew, PASSWORD_DEFAULT);
                                        $sqlQuery = "UPDATE Teacher set teacherPw = '$hash' WHERE userName = '$user'";
                                        $query = $connection->prepare($sqlQuery);
                                        $query->execute();
                                        $sqlQuery = "UPDATE Teacher set firstPwChanged = 1 WHERE userName = '$user'";
                                        $query = $connection->prepare($sqlQuery);
                                        $query->execute();

                                        $_SESSION['changePwFirst'] = "";
                                        echo '<meta http-equiv="refresh" content="0; URL=administrate.php">';
                                    } else {
                                        echo "Die neu eingegebenen Passwörter stimmen nicht überein!";
                                    }
                                } else {
                                    echo "Passwort falsch!";
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