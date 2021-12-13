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


$sqlQuery = 'SELECT teacherID, userName, firstPwChanged FROM Teacher';

$query = $connection->prepare($sqlQuery);
$query->execute();
$user = $query->fetchAll(PDO::FETCH_NUM);

for ($i = 0; $i < count($user); $i++) {
    if ($user[$i][2] == 0) {
        $user[$i][2] = "Nein";
    } elseif ($user[$i][2] == 1) {
        $user[$i][2] = "Ja";
    }
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
    <title>Benutzerverwaltung - Praktikumsdatenbank HoLa</title>
    <?php
    if ($_SESSION['userid'] != "admin") {
        echo '<meta http-equiv="refresh" content="0; URL=login.php">';
    }
    if ($_SESSION['changePwFirst'] == 1) {
        echo '<meta http-equiv="refresh" content="0; URL=changePassword.php">';
    }

    function generateRandomString($length = 9)
    {
        return substr(str_shuffle(str_repeat(implode('', range('!', 'z')), $length)), 0, $length);
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
                        Hier können Sie die Benutzerkonten der Lehrkräfte verwalten.
                    </h2>
                </div>
                <div>
                    <h4 class="text-white">
                        Sie sind angemeldet als: <?php echo $_SESSION['userid']; ?>
                    </h4>
                </div>
                <form style=" position: absolute; top: 22px; right: 20px; z-index: 100;" accept-charset="utf-8" action="logout.php" method="POST">
                    <div class="input-group">
                        <img class="input-group-text rounded-end rounded-pill" src="res/box-arrow-left.svg">
                        <span class="bg-white rounded-start rounded-pill">
                            <input class="input-group-text btn btn-outline-primary rounded-start rounded-pill" type="submit" name="submit" value="Logout">
                        </span>
                    </div>
                </form>
            </header>
            <main class="container-fluid p-3">
                <div class="border rounded p-3">
                    <h4 class="fw-bold">Anlegen neuer Benutzerkonten:</h4>
                    <form class="grid needs-validation" accept-charset="utf-8" id="createUser" action="administrateUser.php" method="POST" onSubmit="return confirm('Möchten Sie den Benutzer wirklich anlegen?')" novalidate>
                        <label class="form-label" for="createUser">Benutzername (Muster: m.mustermann):</label>
                        <div class="input-group has-validation">
                            <input class="rounded-start form-control" type="text" name="createUser" maxlength="50" placeholder="m.mustermann" required autocomplete="off">
                            <input class="input-group-text btn btn-outline-primary rounded-end" type="submit" name="submitCreateUser" value="Anlegen">
                            <div class="invalid-feedback">
                                Geben Sie bitte einen Benutzernamen ein.
                            </div>
                        </div>
                    </form>
                    <?php

                    if (isset($_POST['submitCreateUser'])) {
                        $newPassword = generateRandomString();
                        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
                        $createUser = $_POST['createUser'];

                        $sqlQuery = "INSERT INTO Teacher(userName, teacherPw, firstPwChanged) VALUES ('$createUser','$hash', 0)";

                        $query = $connection->prepare($sqlQuery);
                        if ($query->execute() === true) {
                            echo '<script>alert("Das neue Passwort für ' . $createUser . ' lautet: ' . $newPassword . '")</script>';
                            echo '<meta http-equiv="refresh" content="0; URL=administrateUser.php">';
                        } else {
                            echo '<script>alert("Fehler! Irgendwas scheint nicht geklappt zu haben. Überprüfen sie bitte Ihre Eingabe und probieren Sie es erneut. Hinweis: Benutzer dürfen nur einmal angelegt werden.")</script>';
                        }
                    }
                    ?>
                </div>
                <div class="border rounded p-3 mt-3">
                    <h4 class="fw-bold">Löschen alter Benutzerkonten:</h4>
                    <form class="grid needs-validation" accept-charset="utf-8" id="deleteUser" action="administrateUser.php" method="POST" onSubmit="return confirm('Möchten Sie den Benutzer wirklich löschen?')" novalidate>
                        <label class="form-label" for="deleteUser">Benutzername:</label>
                        <div class="input-group has-validation">
                            <input class="rounded-start form-control" type="text" name="deleteUser" maxlength="50" placeholder="Geben Sie bitte den Benutzernamen ein, den Sie löschen möchten." required autocomplete="off">
                            <input class="input-group-text btn btn-outline-primary rounded-end" type="submit" name="submitDeleteUser" value="Löschen">
                            <div class="invalid-feedback">
                                Geben Sie bitte den Klassen- oder Kursnamen ein, den Sie löschen möchten.
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submitDeleteUser'])) {
                        $deleteUser = $_POST['deleteUser'];
                        if ($deleteUser != "admin") {
                            $sqlQuery = "SELECT teacherID FROM Teacher WHERE userName = '$deleteUser'";
                            $query = $connection->prepare($sqlQuery);
                            $query->execute();
                            $teacherID = $query->fetchAll(PDO::FETCH_NUM);
                            $teacherid = $teacherID[0][0];

                            $sqlQuery = "UPDATE Pin set teacherID = 0 WHERE teacherID = '$teacherid'";
                            $query = $connection->prepare($sqlQuery);
                            $query->execute();

                            $sqlQuery = "DELETE FROM Teacher WHERE userName = '$deleteUser'";
                            $query = $connection->prepare($sqlQuery);
                            $query->execute();

                            echo '<meta http-equiv="refresh" content="0; URL=administrateUser.php">';
                        } else {
                            echo '<script>alert("Der Benutzer admin kann nicht gelöscht werden!")</script>';
                        }
                    }
                    ?>
                </div>
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
                <div class="pt-3 mt-3">
                    <table class="table table-bordered table-striped table-hover table-sortable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Benutzername</th>
                                <th scope="col">Erstpasswort geändert?</th>
                                <td style="width:25px" class="fw-bold" scope="col">Passwort zurücksetzen</td>
                            </tr>
                        </thead>
                        <form accept-charset="utf-8" action="administrateUser.php" method="POST" onSubmit="return confirm('Möchten Sie von <?php echo $user[$i][1] ?> das Passwort wirklich zurücksetzen?')">
                            <tbody>
                                <?php
                                if (count($user) > 0) {
                                    for ($i = 1; $i < count($user); $i++) {
                                        echo '<tr>';
                                        for ($j = 0; $j < count($user[0]); $j++) {
                                            echo "<td>" . $user[$i][$j] . "</td>";
                                        }
                                        echo '<td><input style="width: 100%" class="btn btn-warning rounded-pill" type="submit" name="' . $user[$i][0] . '" value="Passwort zurücksetzen"></td>';
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td>Keine Benutzer vorhanden!</td></tr>";
                                }
                                ?>
                        </form>
                        </tbody>
                    </table>
                </div>
                <script src="js/index.js"></script>
                <?php
                for ($i = 1; $i < count($user); $i++) {
                    if (isset($_POST[$user[$i][0]])) {
                        $userID = $user[$i][0];
                        $passwordNew = generateRandomString();

                        $hash = password_hash($passwordNew, PASSWORD_DEFAULT);
                        $sqlQuery = "UPDATE Teacher set teacherPw = '$hash' WHERE teacherID = '$userID'";
                        $query = $connection->prepare($sqlQuery);
                        $query->execute();

                        $sqlQuery = "UPDATE Teacher set firstPwChanged = 0 WHERE teacherID = '$userID'";
                        $query = $connection->prepare($sqlQuery);
                        $query->execute();

                        echo '<script>alert("Das neue Passwort für ' . $user[$i][1] . ' lautet: ' . $passwordNew . '")</script>';
                        echo '<meta http-equiv="refresh" content="0; URL=administrateUser.php">';
                    }
                }
                ?>
                <div class="row p-3 mb-3">
                    <a class="input-group-text btn btn-outline-primary rounded-pill" href="administrate.php">Zurück zur Verwaltungsseite</a>
                </div>
            </main>
            <script>
                $(document).ready(function() {

                    var back_to_top_button = ['<a href="#top" class="back-to-top rounded" style="font-size: 18px; font-weight: bold; background: #ff7f00; color: white; text-decoration: none; position: fixed; bottom: 20px;right: 20px;padding: 1em;z-index: 100;">▲</a>'].join("");
                    $("body").append(back_to_top_button)


                    $(".back-to-top").hide();


                    $(function() {
                        $(window).scroll(function() {
                            if ($(this).scrollTop() > 100) {
                                $('.back-to-top').fadeIn();
                            } else {
                                $('.back-to-top').fadeOut();
                            }
                        });

                        $('.back-to-top').click(function() {
                            $('body,html').animate({
                                scrollTop: 0
                            }, 200);
                            return false;
                        });
                    });
                });

                $(document).ready(function() {
                    $(document.body).on("click", "tr[data-href]", function() {
                        window.location.href = this.dataset.href;
                    });
                });

                function removeSort() {
                    document.querySelectorAll(`th`).forEach((th) => th.classList.remove("th-sort-asc", "th-sort-desc"));
                }
            </script>
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
                        <p class="fw-bold">Passwort ändern</p>
                        <hr />
                        <a href="changePassword.php">Hier können Sie Ihr Passwort ändern!</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>