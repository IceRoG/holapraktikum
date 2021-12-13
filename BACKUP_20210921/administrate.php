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

if ($_SESSION['userid'] == "admin") {
    $sqlQuery = 'SELECT pin, pinID, grade, userName FROM Pin LEFT JOIN Teacher ON Pin.teacherID = Teacher.teacherID;';
} else {
    $sqlQuery = 'SELECT pin, pinID, grade FROM Pin WHERE teacherID = ' . $_SESSION['teacherid'] . '';
}

$query = $connection->prepare($sqlQuery);
$query->execute();
$pins = $query->fetchAll(PDO::FETCH_NUM);
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
    <title>Verwaltung - Praktikumsdatenbank HoLa</title>
    <?php
    if ($_SESSION['userid'] == "") {
        echo '<meta http-equiv="refresh" content="0; URL=login.php">';
    }
    if ($_SESSION['changePwFirst'] == 1) {
        echo '<meta http-equiv="refresh" content="0; URL=changePassword.php">';
    }

    $autofocus = "";

    if (isset($_POST['submit'])) {
        $search = $_POST['search'];
        $autofocus = "";
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
                        Hier können Sie die Praktikumsbewertungen Ihrer Klassen und Kurse verwalten.
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
                    <h4 class="fw-bold">Anlegen neuer Klassen und Kurse:</h4>
                    <form class="grid needs-validation" accept-charset="utf-8" id="createGrade" action="administrate.php" method="POST" onSubmit="return confirm('Möchten Sie die Klasse bzw. den Kurs wirklich anlegen?')" novalidate>
                        <label class="form-label" for="createGrade">Klasse- bzw. Kursname:</label>
                        <div class="input-group has-validation">
                            <input class="rounded-start form-control" type="text" name="createGrade" maxlength="50" placeholder="Geben Sie bitte eine Klasse oder einen Kurs ein." required autocomplete="off">
                            <input class="input-group-text btn btn-outline-primary rounded-end" type="submit" name="submitCreateGrade" value="Anlegen">
                            <div class="invalid-feedback">
                                Geben Sie bitte eine Klasse oder einen Kurs ein.
                            </div>
                        </div>
                    </form>
                    <?php
                    function generateRandomString($length = 9)
                    {
                        return substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789", $length)), 0, $length);
                    }

                    if (isset($_POST['submitCreateGrade'])) {
                        $newPin = generateRandomString();
                        $teacherID = $_SESSION['teacherid'];
                        $createGrade = $_POST['createGrade'];
                        $uses = 0;

                        $sqlQuery = "INSERT INTO Pin(teacherID, pin, grade, uses) VALUES ('$teacherID','$newPin','$createGrade','$uses')";

                        $query = $connection->prepare($sqlQuery);
                        if ($query->execute() === true) {
                            echo '<meta http-equiv="refresh" content="0; URL=administrate.php">';
                        } else {
                            echo '<script>alert("Fehler! Irgendwas scheint nicht geklappt zu haben. Überprüfen sie bitte Ihre Eingabe und probieren Sie es erneut. Hinweis: Klassen und Kurse dürfen nur einmal angelegt werden.")</script>';
                        }
                    }
                    ?>
                </div>
                <div class="border rounded p-3 mt-3">
                    <h4 class="fw-bold">Löschen alter Klassen und Kurse:</h4>
                    <form class="grid needs-validation" accept-charset="utf-8" id="deleteGrade" action="administrate.php" method="POST" onSubmit="return confirm('Möchten Sie die Klasse bzw. den Kurs wirklich löschen? Alle dazugehörigen nicht freigegebenen Datensätze gehen somit verloren.')" novalidate>
                        <label class="form-label" for="deleteGrade">Klasse- bzw. Kursname:</label>
                        <div class="input-group has-validation">
                            <input class="rounded-start form-control" type="text" name="deleteGrade" maxlength="50" placeholder="Geben Sie bitte den Klassen- oder Kursnamen ein, den Sie löschen möchten." required autocomplete="off">
                            <input class="input-group-text btn btn-outline-primary rounded-end" type="submit" name="submitDeleteGrade" value="Löschen">
                            <div class="invalid-feedback">
                                Geben Sie bitte den Klassen- oder Kursnamen ein, den Sie löschen möchten.
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submitDeleteGrade'])) {
                        $deleteGrade = $_POST['deleteGrade'];

                        $sqlQuery = "SELECT teacherID, pinID FROM Pin WHERE grade = '$deleteGrade'";

                        $query = $connection->prepare($sqlQuery);
                        $query->execute();
                        $checkTeacherID = $query->fetchAll(PDO::FETCH_NUM);

                        if ($checkTeacherID[0][0] == $teacherID || $_SESSION['userid'] == "admin") {
                            $sqlQuery = 'DELETE FROM Job WHERE pinID =' . $checkTeacherID[0][1] . ' AND approval = 0';
                            $query = $connection->prepare($sqlQuery);
                            $query->execute();

                            $sqlQuery = 'UPDATE Job set pinID = "" WHERE pinID =' . $checkTeacherID[0][1] . '';
                            $query = $connection->prepare($sqlQuery);
                            $query->execute();

                            $sqlQuery = "DELETE FROM Pin WHERE grade = '$deleteGrade'";

                            $query = $connection->prepare($sqlQuery);
                            if ($query->execute() === true) {
                                echo '<meta http-equiv="refresh" content="0; URL=administrate.php">';
                            } else {
                                echo '<script>alert("Fehler! Irgendwas scheint nicht geklappt zu haben. Überprüfen sie bitte Ihre Eingabe und probieren Sie es erneut.")</script>';
                            }
                        } else {
                            echo '<script>alert("Sie haben keine Berechtigung diese Klasse bzw. diesen Kurs zu löschen!")</script>';
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
                    <?php
                    echo "<h3 class='fw-bold'>Ihre auf Freigabe wartenden Klassen und Kurse:</h3>";

                    for ($k = 0; $k < count($pins); $k++) {
                        $sqlQuery = 'SELECT jobID, studentName, studentLastName, jobName, companyName, companyCity, ROUND((careRating + companyExperienceRating + jobExperienceRating +
                        personalRating) / "4") AS avgRating FROM Job WHERE pinID = ' . $pins[$k][1] . ' AND approval = 0';

                        $query = $connection->prepare($sqlQuery);
                        $query->execute();
                        $output = $query->fetchAll(PDO::FETCH_NUM);

                        echo "<div>";
                        echo "<h4>" . $pins[$k][2] . " (" . $pins[$k][0] . ")";
                        if ($_SESSION['userid'] == "admin") {
                            echo " → " . $pins[$k][3];
                        }
                        echo ":</h4>";
                        echo ' <table class="table table-bordered table-striped table-hover table-sortable">
                        <thead>
                            <tr>
                                <th scope="col">Vorname</th>
                                <th scope="col">Nachname</th>
                                <th scope="col">Beruf</th>
                                <th scope="col">Betrieb</th>
                                <th scope="col">Ort</th>
                                <th scope="col">Ø-Bewertung Schüler</th>
                                <td scope="col"></td>
                            </tr>
                        </thead>';
                        echo "<tbody>";
                        if (count($output) > 0) {
                            for ($i = 0; $i < count($output); $i++) {
                                echo '<tr data-href="administrateDetails.php?jobID=' . $output[$i][0] . '&pinID=' . $pins[$k][1] . '">';
                                for ($j = 1; $j < count($output[0]); $j++) {
                                    echo "<td>" . $output[$i][$j] . "</td>";
                                }
                                echo "<td>▸</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td>Keine freizugebenden Daten zu dieser PIN gefunden!";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        echo "<br>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <?php
                if ($_SESSION['userid'] == "admin") {
                    echo "<div class='pt-3'>";
                    echo "<h3 class='fw-bold'>Alle in der Datenbank befindlichen Datensätze:</h3>";
                    echo '  <form accept-charset="utf-8" action="administrate.php" method="POST">
                    <div class="input-group mt-3 mb-3 col">
                        <img class="input-group-text bg-white border border-end-0 rounded-end rounded-pill" src="res/search.svg">
                        <input class="form-control border border-start-0" type="search" placeholder="Suche nach Berufsbezeichnung..." id="search" name="search" value="' . $search . '" ' . $autofocus . ' autocomplete="off">
                        <span class="bg-white rounded-start rounded-pill">
                            <input class="input-group-text btn btn-outline-primary rounded-start rounded-pill" type="submit" name="submit" value="Suchen">
                        </span>
                    </div>
                    </form>';
                    echo '<table class="table table-bordered table-striped table-hover table-sortable">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Vorname</th>
                        <th scope="col">Nachname</th>
                        <th scope="col">Beruf</th>
                        <th scope="col">Betrieb</th>
                        <th scope="col">Ort</th>
                        <th scope="col">Ø-Bewertung Schüler</th>
                        <td scope="col"></td>
                        </tr>
                    </thead>
                    <tbody id="output">
                    </tbody>
                    </table>';
                    echo "</div>";

                    echo "<div class='pt-3'>";
                    echo  '<div class="row p-3 mb-3">
                    <a class="input-group-text btn btn-outline-primary rounded-pill" href="administrateUser.php">Hier geht&#39;s zur Benutzer-Verwaltung!</a>
                    </div>';
                    echo "</div>";

                    echo "<div>";
                    echo '<form style="grid" accept-charset="utf-8" action="administrate.php" method="POST">
                        <div class="row p-3 mb-3">
                            <input class="input-group-text btn btn-outline-primary rounded-pill" type="submit" name="deleteOld" value="Lösche alle Datensätze, die älter als 5 Jahre sind!">
                        </div>
                    </form>';
                    echo "</div>";
                }

                if (isset($_POST['deleteOld'])) {
                    $deleteOld = date('Y') - 5;

                    $sqlQuery = "DELETE FROM Job WHERE created < '$deleteOld'";

                    $query = $connection->prepare($sqlQuery);
                    if ($query->execute() === true) {
                        echo '<meta http-equiv="refresh" content="0; URL=administrate.php">';
                    } else {
                        echo '<script>alert("Fehler! Irgendwas scheint nicht geklappt zu haben. Probieren Sie es später erneut.")</script>';
                    }
                }

                ?>
                <script src="js/index.js"></script>
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

                $(document).ready(function() {
                    $.ajax({
                        type: 'POST',
                        url: 'administrateSearch.php',
                        data: {
                            search: $("#search").val(),
                        },
                        success: function(data) {
                            $("#output").html(data);
                            removeSort();
                        }
                    });
                });

                $(document).ready(function() {
                    $("#search").keyup(function() {
                        $.ajax({
                            type: 'POST',
                            url: 'administrateSearch.php',
                            data: {
                                search: $("#search").val(),
                            },
                            success: function(data) {
                                $("#output").html(data);
                                removeSort();
                            }
                        });
                    });
                });
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