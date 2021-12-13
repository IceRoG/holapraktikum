<!DOCTYPE html>

<html lang="de-DE">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" href="../res/index.png">
    <script src="../js/jquery-3.6.0.js"></script>
    <title>Formular - Praktikumsdatenbank HoLa</title>

    <?php
    $firstName =  htmlspecialchars($_POST['firstName']);
    $lastName =   htmlspecialchars($_POST['lastName']);
    $pin =   htmlspecialchars($_POST['pin']);
    $jobName =  htmlspecialchars($_POST['jobName']);
    $companyName =  htmlspecialchars($_POST['companyName']);
    $address =  htmlspecialchars($_POST['address']);
    $city =  htmlspecialchars($_POST['city']);
    $plz =  htmlspecialchars($_POST['plz']);
    $homepage =  htmlspecialchars($_POST['homepage']);
    $tel =  htmlspecialchars($_POST['tel']);
    $email =  htmlspecialchars($_POST['email']);
    $req =  htmlspecialchars($_POST['req']);
    $applicationType =  htmlspecialchars($_POST['applicationType']);
    $applicationTime =  htmlspecialchars($_POST['applicationTime']);
    $workingHoursStart =  htmlspecialchars($_POST['workingHoursStart']);
    $workingHoursEnd =  htmlspecialchars($_POST['workingHoursEnd']);
    $responsibility =   htmlspecialchars($_POST['responsibility']);
    $care =  htmlspecialchars($_POST['care']);
    $companyExperience =  htmlspecialchars($_POST['companyExperience']);
    $jobExperience =  htmlspecialchars($_POST['jobExperience']);
    $personalRating =  htmlspecialchars($_POST['personalRating']);
    $date = date('Y');
    ?>
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <header class="container-fluid pt-3 pb-4 ">
                <div>
                    <h1 class="text-white fw-bold"><a class="text-reset text-decoration-none" href="../index.php">Praktikumsdatenbank der Hohen Landesschule Hanau</a></h1>
                </div>
                <div>
                    <h2 class="text-white">Hier kannst du deine Praktikumsbewertung in die Datenbank eintragen!</h2>
                </div>
            </header>
            <main class="container-fluid mt-3">
                <form class="grid needs-validation" id="form1" name="form1" accept-charset="utf-8" action="index.php" method="POST" onSubmit="return confirm('Möchstest du die Daten wirklich absenden?')" novalidate>
                    <fieldset class="row p-3">
                        <legend class="fw-bold fs-5">Persönliche Daten (werden später nicht in der Datenbank angezeigt)</legend>
                        <div class="col">
                            <label class="form-label" for="firstName">Vorname:</label>
                            <input class="rounded form-control" type="text" data-index="1" name="firstName" maxlength="50" placeholder="Gib bitte deinen Vornamen ein." value="<?php echo $firstName; ?>" required autocomplete="off">
                            <div class="invalid-feedback">
                                Gib bitte deinen Vornamen ein.
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label" for="lastName">Nachname:</label>
                            <input class="rounded form-control" type="text" data-index="2" name="lastName" maxlength="50" placeholder="Gib bitte deinen Nachnamen ein." value="<?php echo $lastName; ?>" required autocomplete="off">
                            <div class="invalid-feedback">
                                Gib bitte deinen Nachnamen ein.
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label" for="pin">PIN (bekommst du von deiner PoWi-Lehrkraft):</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text rounded-start" id="inputGroupPrepend">#</span>
                                <input class="rounded-end form-control" data-index="3" type="text" name="pin" placeholder="Gib bitte eine gültige PIN ein." required autocomplete="off">
                                <div class="invalid-feedback">
                                    Gib bitte eine gültige PIN ein.
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="row p-3">
                        <legend class="fw-bold fs-5">Beruf</legend>
                        <div class="col">
                            <label class="form-label" for="jobName">Berufsbezeichnung:</label>
                            <input class="rounded form-control" type="text" data-index="4" name="jobName" maxlenght="100" placeholder="Gib bitte eine Berufsbezeichnung ein." value="<?php echo $jobName; ?>" required autocomplete="off">
                            <div class="invalid-feedback">
                                Gib bitte eine Berufsbezeichnung ein.
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="p-3">
                        <legend class="fw-bold fs-5">Betrieb</legend>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="companyName">Name des Betriebs:</label>
                                <input class="rounded form-control" type="text" data-index="5" name="companyName" maxlenght="100" placeholder="Gib bitte einen Betriebsnamen ein." value="<?php echo $companyName; ?>" required autocomplete="off">
                                <div class="invalid-feedback">
                                    Gib bitte einen Betriebsnamen ein.
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="address">Straße und Hausnummer:</label>
                                <input class="rounded form-control" type="text" data-index="6" name="address" maxlenght="100" placeholder="Gib bitte eine Adresse ein." value="<?php echo $address; ?>" required autocomplete="off">
                                <div class="invalid-feedback">
                                    Gib bitte eine Adresse ein.
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="plz">Postleitzahl:</label>
                                <input class="rounded form-control" type="text" data-index="7" name="plz" minlength="5" maxlength="5" onkeypress="validatePlz(event)" placeholder="Gib bitte eine Postleitzahl ein." value="<?php echo $plz; ?>" required autocomplete="off">
                                <div class=" invalid-feedback">
                                    Gib bitte eine Postleitzahl ein.
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="city">Ort:</label>
                                <input class="rounded form-control" type="text" data-index="8" name="city" maxlenght="25" placeholder="Gib bitte einen Ort ein." value="<?php echo $city; ?>" required autocomplete="off">
                                <div class="invalid-feedback">
                                    Gib bitte einen Ort ein.
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="homepage">Homepage:</label>
                                <input class="rounded form-control" type="url" data-index="9" name="homepage" placeholder="Optional" maxlenght="100" value="<?php echo $homepage; ?>" autocomplete="off">
                            </div>

                            <div class="col">
                                <label class="form-label" for="email">E-Mail-Adresse:</label>
                                <input class="rounded form-control" type="email" data-index="10" name="email" placeholder="Optional" maxlenght="100" value="<?php echo $email; ?>" autocomplete="off">
                            </div>


                            <div class="col">
                                <label class="form-label" for="tel">Telefonnummer:</label>
                                <input class="rounded form-control" type="text" data-index="11" name="tel" placeholder="Optional" maxlenght="50" onkeypress="validateTel(event)" value="<?php echo $tel; ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="applicationType">Die Bewerbung erfolgte:</label>
                                <select class="form-select rounded form-control" data-index="12" name="applicationType" required>
                                    <option value="" disabled <?php echo ($applicationType == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                    <option value="0" <?php echo ($applicationType == "0" ? "selected" : ""); ?>>persönlich im Betrieb</option>
                                    <option value="1" <?php echo ($applicationType == "1" ? "selected" : ""); ?>>telefonisch</option>
                                    <option value="2" <?php echo ($applicationType == "2" ? "selected" : ""); ?>>per E-Mail</option>
                                    <option value="3" <?php echo ($applicationType == "3" ? "selected" : ""); ?>>online (Homepage der Firma)</option>
                                    <option value="4" <?php echo ($applicationType == "4" ? "selected" : ""); ?>>per Post (schriftliche Bewerbung)</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wähle bitte eine Bewerbungsart aus.
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="applicationTime">Zeitpunkt der Bewerbung:</label>
                                <div class="input-group has-validation">
                                    <select class="form-select rounded-start form-control" name="applicationTime" required>
                                        <option value="" disabled <?php echo ($applicationTime == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                        <option value="0" <?php echo ($applicationTime == "0" ? "selected" : ""); ?>>mehr als 12 Monate</option>
                                        <option value="1" <?php echo ($applicationTime == "1" ? "selected" : ""); ?>>6 - 12 Monate</option>
                                        <option value="2" <?php echo ($applicationTime == "2" ? "selected" : ""); ?>>3 - 6 Monate</option>
                                        <option value="3" <?php echo ($applicationTime == "3" ? "selected" : ""); ?>>weniger als 3 Monate</option>
                                    </select>
                                    <span class="input-group-text rounded-end" for="applicationType">vor Beginn des Praktikums</span>
                                    <div class="invalid-feedback">
                                        Wähle bitte einen Bewerbungszeitpunkt aus.
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="workingHoursStart">tägliche Arbeitszeit:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text rounded-start">von:</span>
                                    <input class="form-control" type="time" data-index="13" name="workingHoursStart" value="<?php echo $workingHoursStart; ?>" required autocomplete="off">
                                    <span class="input-group-text rounded-0">Uhr bis:</span>
                                    <input class="form-control" type="time" data-index="14" name="workingHoursEnd" value="<?php echo $workingHoursEnd; ?>" required autocomplete="off">
                                    <span class="input-group-text rounded-end">Uhr</span>
                                    <div class="invalid-feedback">
                                        Gib bitte deine tägliche Arbeitszeit ein.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="req">Voraussetzungen:</label>
                                <textarea class="rounded form-control" rows="4" data-index="15" cols="50" name="req" placeholder="Optional" maxlenght="1000"><?php echo $req; ?></textarea>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="p-3">
                        <legend class="fw-bold fs-5">Bewertung durch den Schüler (in Schulnoten)</legend>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="responsibility">Hast du im Praktikum eigenverantworliche Tätigkeiten ausüben können?</label>
                                <select class="form-select rounded form-control" name="responsibility" required>
                                    <option value="" disabled <?php echo ($responsibility == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                    <option value="1" <?php echo ($responsibility == "1" ? "selected" : ""); ?>>Ja</option>
                                    <option value="0" <?php echo ($responsibility == "0" ? "selected" : ""); ?>>Nein</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wähle bitte eine Antwort aus.
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="care">Bewertung der Praktikantenbetreuung im Betrieb:</label>
                                <select class="form-select rounded form-control" name="care" required>
                                    <option value="" disabled <?php echo ($care == "" ? "selected" : ""); ?>>Bitte auswählen</option>
                                    <option value="1" <?php echo ($care  == "1" ? "selected" : ""); ?>>1</option>
                                    <option value="2" <?php echo ($care  == "2" ? "selected" : ""); ?>>2</option>
                                    <option value="3" <?php echo ($care  == "3" ? "selected" : ""); ?>>3</option>
                                    <option value="4" <?php echo ($care  == "4" ? "selected" : ""); ?>>4</option>
                                    <option value="5" <?php echo ($care  == "5" ? "selected" : ""); ?>>5</option>
                                    <option value="6" <?php echo ($care  == "6" ? "selected" : ""); ?>>6</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wähle bitte eine Antwort aus.
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="companyExperience">Einblick in den Betrieb:</label>
                                <select class="form-select rounded form-control" name="companyExperience" required>
                                    <option value="" disabled <?php echo ($companyExperience == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                    <option value="1" <?php echo ($companyExperience == "1" ? "selected" : ""); ?>>1</option>
                                    <option value="2" <?php echo ($companyExperience == "2" ? "selected" : ""); ?>>2</option>
                                    <option value="3" <?php echo ($companyExperience == "3" ? "selected" : ""); ?>>3</option>
                                    <option value="4" <?php echo ($companyExperience == "4" ? "selected" : ""); ?>>4</option>
                                    <option value="5" <?php echo ($companyExperience == "5" ? "selected" : ""); ?>>5</option>
                                    <option value="6" <?php echo ($companyExperience == "6" ? "selected" : ""); ?>>6</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wähle bitte eine Antwort aus.
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label" for="jobExperience">Einblick in den Beruf:</label>
                                <select class="form-select rounded form-control" name="jobExperience" required>
                                    <option value="" disabled <?php echo ($jobExperience == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                    <option value="1" <?php echo ($jobExperience == "1" ? "selected" : ""); ?>>1</option>
                                    <option value="2" <?php echo ($jobExperience == "2" ? "selected" : ""); ?>>2</option>
                                    <option value="3" <?php echo ($jobExperience == "3" ? "selected" : ""); ?>>3</option>
                                    <option value="4" <?php echo ($jobExperience == "4" ? "selected" : ""); ?>>4</option>
                                    <option value="5" <?php echo ($jobExperience == "5" ? "selected" : ""); ?>>5</option>
                                    <option value="6" <?php echo ($jobExperience == "6" ? "selected" : ""); ?>>6</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wähle bitte eine Antwort aus.
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="personalRating">Persönliche Gesamtbewertung:</label>
                                <select class="form-select rounded form-control" name="personalRating" required>
                                    <option value="" disabled <?php echo ($personalRating == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                    <option value="1" <?php echo ($personalRating == "1" ? "selected" : ""); ?>>1</option>
                                    <option value="2" <?php echo ($personalRating == "2" ? "selected" : ""); ?>>2</option>
                                    <option value="3" <?php echo ($personalRating == "3" ? "selected" : ""); ?>>3</option>
                                    <option value="4" <?php echo ($personalRating == "4" ? "selected" : ""); ?>>4</option>
                                    <option value="5" <?php echo ($personalRating == "5" ? "selected" : ""); ?>>5</option>
                                    <option value="6" <?php echo ($personalRating == "6" ? "selected" : ""); ?>>6</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wähle bitte eine Antwort aus.
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="row p-3 mb-3">
                        <input class="input-group-text btn btn-outline-primary rounded-pill" type="submit" name="submit" value="Daten absenden">
                    </div>
                </form>

                <script>
                    $('#form1').on('keydown', 'input', function(event) {
                        if (event.which == 13) {
                            event.preventDefault();
                            var $this = $(event.target);
                            var index = parseFloat($this.attr('data-index'));
                            $('[data-index="' + (index + 1).toString() + '"]').focus();
                        }
                    });

                    function validatePlz(evt) {
                        var theEvent = evt || window.event;
                        var key = theEvent.keyCode || theEvent.which;
                        key = String.fromCharCode(key);
                        var regex = /[0-9]/;
                        if (!regex.test(key)) {
                            theEvent.returnValue = false;
                            if (theEvent.preventDefault) theEvent.preventDefault();
                        }
                    }

                    function validateTel(evt) {
                        var theEvent = evt || window.event;
                        var key = theEvent.keyCode || theEvent.which;
                        key = String.fromCharCode(key);
                        var regex = /[0-9]|[/]|[+]|[ ]/;
                        if (!regex.test(key)) {
                            theEvent.returnValue = false;
                            if (theEvent.preventDefault) theEvent.preventDefault();
                        }
                    }

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
                <?php
                $server = 'mysql:host=mysql5.inf5.de; dbname=db450157_21; charset=utf8';
                $username = 'db450157_21';
                $password = 'gk2e+KPby13k';

                try {
                    $connection = new PDO($server, $username, $password);
                } catch (PDOException $e) {
                    print $e->getMessage();
                }

                if (isset($_POST["submit"])) {
                    $sqlQuery = "SELECT pin, uses, pinID  FROM Pin WHERE pin ='$pin'";
                    $query = $connection->prepare($sqlQuery);
                    $query->execute();
                    $pinCheck = $query->fetchAll(PDO::FETCH_NUM);

                    if (count($pinCheck) == 1) {
                        if ($pinCheck[0][1] < 30) {
                            $pinID = $pinCheck[0][2];
                            $sqlQuery = "SELECT studentName, studentLastName FROM Job WHERE pinID ='$pinID'";
                            $query = $connection->prepare($sqlQuery);
                            $query->execute();
                            $nameCheck = $query->fetchAll(PDO::FETCH_NUM);

                            if ($nameCheck[0][0] == $firstName && $nameCheck[0][1] == $lastName) {
                                $pin = "";
                                echo '<script>alert("Du hast bereits einen Datensatz eingefügt. Ein nochmaliges Einfügen ist unzulässig.")</script>';
                            } else {
                                $sqlQuery = "INSERT INTO Job(studentName, studentLastName, jobName, companyName, companyAddress, companyCity, companyPLZ,
                                companyHomepage, companyEmail, companyTel, applicationType, applicationReq, applicationTime, workingHoursStart,
                                workingHoursEnd, responsibility, careRating, companyExperienceRating, jobExperienceRating,
                                personalRating, approval, created, pinID)
                                VALUES ('$firstName', '$lastName', '$jobName', '$companyName', '$address', '$city', '$plz',
                                '$homepage', '$email', '$tel', '$applicationType', '$req', '$applicationTime', '$workingHoursStart',
                                '$workingHoursEnd', '$responsibility', '$care', '$companyExperience', '$jobExperience',
                                '$personalRating', 0, '$date', '$pinID')";;
                                $query = $connection->prepare($sqlQuery);
                                if ($query->execute() === true) {
                                    $sqlQuery = "UPDATE Pin set uses = uses + 1 WHERE pin ='$pin'";
                                    $query = $connection->prepare($sqlQuery);
                                    $query->execute();

                                    echo '<meta http-equiv="refresh" content="0; URL=../formSuccess.html">';
                                } else {
                                    $pin = "";
                                    echo '<script>alert("Fehler! Irgendwas scheint beim Einfügen deiner Praktikumsbewertung nicht geklappt zu haben. Überprüfe die Daten bitte noch einmal und probiere es erneut.")</script>';
                                }
                            }
                        } else {
                            $pin = "";
                            echo '<script>alert("Die PIN, die du eingegeben hast, wurde schon zu oft verwendet. Wende dich bitte an deine Lehrkraft.")</script>';
                        }
                    } else {
                        $pin = "";
                        echo '<script>alert("Die PIN, die du eingegeben hast, ist leider ungültig. Überprüfe sie daher bitte noch einmal.")</script>';
                    }
                }
                ?>
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
                        <a href="../login/index.php">Hier geht's zum Lehrer-Login!</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>