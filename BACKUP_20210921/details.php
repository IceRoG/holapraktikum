<!DOCTYPE html>

<html lang="de-DE">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="res/index.png">
    <script src="js/jquery-3.6.0.js"></script>
    <?php
    $server = 'mysql:host=mysql5.inf5.de; dbname=db450157_21; charset=utf8';
    $username = 'db450157_21';
    $password = 'gk2e+KPby13k';

    try {
        $connection = new PDO($server, $username, $password);
    } catch (PDOException $e) {
        print $e->getMessage();
    }

    $jobID = $_GET['jobID'];

    $sqlQuery = 'SELECT jobName, companyName, companyAddress, companyCity, companyPLZ, companyHomepage, companyEmail, companyTel, applicationType, applicationReq, applicationTime, LEFT(workingHoursStart, 5),
    LEFT(workingHoursEnd, 5), responsibility, careRating, companyExperienceRating, jobExperienceRating, personalRating, teacherRating, teacherComment, created FROM Job WHERE jobID = "' . $jobID . '" AND approval = 1';

    $query = $connection->prepare($sqlQuery);
    $query->execute();
    $output = $query->fetchAll(PDO::FETCH_NUM);

    if (count($output) == 0) {
        $jobName = "Fehler! Kein Eintrag gefunden.";
    } else {
        if ($output[0][8] == 0) {
            $output[0][8] = "persönlich im Betrieb";
        } elseif ($output[0][8] == 1) {
            $output[0][8] = "telefonisch";
        } elseif ($output[0][8] == 2) {
            $output[0][8] = "per E-Mail";
        } elseif ($output[0][8] == 3) {
            $output[0][8] = "online (Homepage der Firma)";
        } elseif ($output[0][8] == 4) {
            $output[0][8] = "per Post (schriftliche Bewerbung)";
        }

        if ($output[0][10] == 0) {
            $output[0][10] = "mehr als 12 Monate vor Beginn des Praktikums";
        } elseif ($output[0][10] == 1) {
            $output[0][10] = "6 - 12 Monate vor Beginn des Praktikums";
        } elseif ($output[0][10] == 2) {
            $output[0][10] = "3 - 6 Monate vor Beginn des Praktikums";
        } elseif ($output[0][10] == 3) {
            $output[0][10] = "weniger als 3 Monate vor Beginn des Praktikums";
        }

        if ($output[0][13] == 0) {
            $output[0][13] = "Nein";
        } elseif ($output[0][13] == 1) {
            $output[0][13] = "Ja";
        }

        if ($output[0][18] == 0) {
            $output[0][18] = "sehr sinnvoll";
        } elseif ($output[0][18] == 1) {
            $output[0][18] = "sinnvoll";
        } elseif ($output[0][18] == 2) {
            $output[0][18] = "weniger sinnvoll";
        } elseif ($output[0][18] == 3) {
            $output[0][18] = "nicht sinnvoll";
        }

        $jobName = $output[0][0];
        $companyName = $output[0][1];
        $address = $output[0][2];
        $city = $output[0][3];
        $plz = $output[0][4];
        $homepage = $output[0][5];
        $tel = $output[0][7];
        $email = $output[0][6];
        $req = $output[0][9];
        $applicationType = $output[0][8];
        $applicationTime = $output[0][10];
        $workingHoursStart = $output[0][11];
        $workingHoursEnd = $output[0][12];
        $responsibility =  $output[0][13];
        $care = $output[0][14];
        $companyExperience = $output[0][15];
        $jobExperience = $output[0][16];
        $personalRating = $output[0][17];
        $teacherRating = $output[0][18];
        $teacherComment = $output[0][19];
        $date = $output[0][20];
    }
    ?>
    <title><?php echo $jobName ?> - Praktikumsdatenbank HoLa</title>

    <script>
        $(document).ready(function() {
            $(window).keydown(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <header class="container-fluid pt-3 pb-4">
                <div>
                    <h1 class="text-white fw-bold"><a class="text-reset text-decoration-none" href="index.php">Praktikumsdatenbank der Hohen Landesschule Hanau</a></h1>
                </div>
                <div>
                    <h2 class="text-white">Praktikumsbewertung für den Beruf <?php echo $jobName ?></h2>
                </div>
            </header>
            <main class="container-fluid mt-3">
                <form class="grid" accept-charset="utf-8" action="index.php" method="POST">
                    <h2 class="fw-bold p-3"><?php echo $jobName ?></h2>
                    <fieldset class="p-3">
                        <legend class="fw-bold fs-5">Betrieb</legend>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="companyName">Name des Betriebs:</label>
                                <input class="rounded form-control" type="text" name="companyName" maxlenght="100" value="<?php echo $companyName; ?>" disabled>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="address">Straße und Hausnummer:</label>
                                <input class="rounded form-control" type="text" name="address" maxlenght="100" value="<?php echo $address; ?>" disabled>
                            </div>

                            <div class="col">
                                <label class="form-label" for="plz">Postleitzahl:</label>
                                <input class="rounded form-control" type="text" name="plz" minlength="5" maxlength="5" onkeypress="validatePlz(event)" value="<?php echo $plz; ?>" disabled>
                            </div>

                            <div class="col">
                                <label class="form-label" for="city">Ort:</label>
                                <input class="rounded form-control" type="text" name="city" maxlenght="25" value="<?php echo $city; ?>" disabled>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="homepage">Homepage:</label>
                                <a href="<?php echo $homepage ?>"><input class="rounded form-control text-primary" style="cursor: pointer;" type="text" name="homepage" maxlenght="100" value="<?php echo $homepage; ?>" readonly></a>
                            </div>

                            <div class="col">
                                <label class="form-label" for="email">E-Mail-Adresse:</label>
                                <input class="rounded form-control" type="text" name="email" maxlenght="100" value="<?php echo $email; ?>" disabled>
                            </div>


                            <div class="col">
                                <label class="form-label" for="tel">Telefonnummer:</label>
                                <input class="rounded form-control" type="text" name="tel" maxlenght="50" onkeypress="validateTel(event)" value="<?php echo $tel; ?>" disabled>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="applicationType">Die Bewerbung erfolgte:</label>
                                <input class="rounded form-control" type="text" name="applicationType" maxlenght="25" value="<?php echo $applicationType; ?>" disabled>
                            </div>

                            <div class="col">
                                <label class="form-label" for="applicationTime">Zeitpunkt der Bewerbung:</label>
                                <input class="rounded form-control" type="text" name="applicationTime" maxlenght="25" value="<?php echo $applicationTime; ?>" disabled>
                            </div>

                            <div class="col">
                                <label class="form-label" for="workingHoursStart">tägliche Arbeitszeit:</label>
                                <input class="form-control" type="text" name="workingHoursStart" value="von <?php echo $workingHoursStart; ?> Uhr bis <?php echo $workingHoursEnd; ?> Uhr" disabled>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="req">Voraussetzungen:</label>
                                <textarea class="rounded form-control" rows="4" cols="50" name="req" maxlenght="1000" disabled><?php echo $req; ?></textarea>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="p-3">
                        <legend class="fw-bold fs-5">Bewertung durch den Schüler (in Schulnoten)</legend>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="responsibility">Hast du im Praktikum eigenverantworliche Tätigkeiten ausüben können?</label>
                                <input class="rounded form-control" type="text" name="responsibility" maxlenght="25" value="<?php echo $responsibility; ?>" disabled>
                            </div>

                            <div class="col">
                                <label class="form-label" for="care">Bewertung der Praktikantenbetreuung im Betrieb:</label>
                                <input class="rounded form-control" type="text" name="care" maxlenght="25" value="<?php echo $care; ?>" disabled>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="companyExperience">Einblick in den Betrieb:</label>
                                <input class="rounded form-control" type="text" name="companyExperience" maxlenght="25" value="<?php echo $companyExperience; ?>" disabled>
                            </div>
                            <div class="col">
                                <label class="form-label" for="jobExperience">Einblick in den Beruf:</label>
                                <input class="rounded form-control" type="text" name="jobExperience" maxlenght="25" value="<?php echo $jobExperience; ?>" disabled>
                            </div>

                            <div class="col">
                                <label class="form-label" for="personalRating">Persönliche Gesamtbewertung:</label>
                                <input class="rounded form-control" type="text" name="personalRating" maxlenght="25" value="<?php echo $personalRating; ?>" disabled>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="p-3">
                        <legend class="fw-bold fs-5">Bewertung durch die Lehrkraft</legend>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="teacherRating">Einschätzung der Lehrkraft:</label>
                                <input class="rounded form-control" type="text" name="teacherRating" maxlenght="25" value="Das Praktikum war <?php echo $teacherRating; ?>." disabled>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="teacherComment">Anmerkungen der Lehrkraft:</label>
                                <textarea class="rounded form-control" rows="4" cols="50" name="teacherComment" maxlenght="1000" disabled><?php echo $teacherComment; ?></textarea>
                            </div>
                        </div>
                    </fieldset>

                    <?php
                    if ($date != 0000) {
                        echo '<div class="row p-3 mb-3"><span>Diese Praktikumsbewertung ist aus dem Jahr ' . $date . '.</div>';
                    }
                    ?>

                    <div class="row p-3 mb-3">
                        <a class="input-group-text btn btn-outline-primary rounded-pill" href="index.php">Zurück zur Startseite</a>
                    </div>
                </form>
                <script>
                    $(document).ready(function() {
                        $(document.body).on("click", "tr[data-href]", function() {
                            window.location.href = this.dataset.href;
                        });
                    });
                </script>
            </main>
        </div>
        <footer class="container-fluid bg-light pt-3">
            <div class="grid">
                <div class="row text-center fs-6">
                    <div class="col">
                        <p class="fw-bold">Kontakt</p>
                        <hr>
                        <p>Schreib uns gerne eine E-Mail unter: <br>
                            <a href="mailto:praktikumsdb@hola-gymnasium.de">praktikumsdb@hola-gymnasium.de</a>
                        </p>
                    </div>
                    <div class="col">
                        <p class="fw-bold">Ersteller</p>
                        <hr>
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
                        <hr>
                        <a href="login.php">Hier geht's zum Lehrer-Login!</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>