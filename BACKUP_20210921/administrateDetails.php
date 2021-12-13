<?php
header("Content-Type: text/html; charset=utf-8");

session_start();
?>
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
    if ($_SESSION['userid'] == "") {
        echo '<meta http-equiv="refresh" content="0; URL=login.php">';
    }
    if ($_SESSION['changePwFirst'] == 1) {
        echo '<meta http-equiv="refresh" content="0; URL=changePassword.php">';
    }

    $server = 'mysql:host=mysql5.inf5.de; dbname=db450157_21; charset=utf8';
    $username = 'db450157_21';
    $password = 'gk2e+KPby13k';

    try {
        $connection = new PDO($server, $username, $password);
    } catch (PDOException $e) {
        print $e->getMessage();
    }

    $jobID = $_GET['jobID'];
    $pinID = $_GET['pinID'];
    $disabled = "readonly";
    $disabledTeacher = "";
    $disabledSelect = "disabled";
    $disabledSelectTeacher = "";
    $editOrSave = "Bearbeiten";

    $sqlQuery = 'SELECT jobName, companyName, companyAddress, companyCity, companyPLZ, companyHomepage, companyEmail, companyTel, applicationType, applicationReq, applicationTime, LEFT(workingHoursStart, 5),
    LEFT(workingHoursEnd, 5), responsibility, careRating, companyExperienceRating, jobExperienceRating, personalRating, teacherRating, teacherComment, created, studentName, studentLastName FROM Job WHERE jobID = "' . $jobID . '" AND approval = 0 AND pinID = ' . $pinID . '';

    $query = $connection->prepare($sqlQuery);
    $query->execute();
    $output = $query->fetchAll(PDO::FETCH_NUM);

    if (count($output) == 0) {
        $firstName = "Fehler! Kein Eintrag gefunden.";
    } else {
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
        $firstName = $output[0][21];
        $lastName = $output[0][22];
    }

    if (isset($_POST['approve'])) {
        $jobName = $_POST['jobName'];
        $companyName = $_POST['companyName'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $plz = $_POST['plz'];
        $homepage = $_POST['homepage'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $req = $_POST['req'];
        $applicationType = $_POST['applicationType'];
        $applicationTime = $_POST['applicationTime'];
        $workingHoursStart = $_POST['workingHoursStart'];
        $workingHoursEnd = $_POST['workingHoursEnd'];
        $responsibility =  $_POST['responsibility'];
        $care = $_POST['care'];
        $companyExperience = $_POST['companyExperience'];
        $jobExperience = $_POST['jobExperience'];
        $personalRating = $_POST['personalRating'];
        $teacherRating = $_POST['teacherRating'];
        $teacherComment = $_POST['teacherComment'];

        $editOrSave = "Bearbeiten";
        $disabled = "readonly";
        $disabledTeacher = "readonly";
        $disabledSelect = "disabled";
        $disabledSelectTeacher = "disabled";

        $sqlQuery = "UPDATE Job SET jobName = '$jobName', companyName = '$companyName', companyAddress = '$address', companyCity = '$city',
        companyPLZ = '$plz', companyHomepage = '$homepage', companyTel = '$tel', companyEmail = '$email',
        applicationReq = '$req',  applicationType = '$applicationType',  applicationTime = '$applicationTime', workingHoursStart = '$workingHoursStart',
        workingHoursEnd = '$workingHoursEnd',  responsibility = '$responsibility', careRating = '$care', companyExperienceRating = '$companyExperience',
        jobExperienceRating = '$jobExperience',  personalRating = '$personalRating', teacherRating = '$teacherRating', teacherComment = '$teacherComment', approval = 1
        WHERE jobID ='$jobID' ";
        $query = $connection->prepare($sqlQuery);
        $query->execute();

        echo '<meta http-equiv="refresh" content="0; URL=administrate.php">';
    } elseif (isset($_POST['Bearbeiten'])) {
        $editOrSave = "Speichern";
        $disabled = "";
        $disabledTeacher = "";
        $disabledSelect = "";
        $disabledSelectTeacher = "";
    } elseif (isset($_POST['Speichern'])) {
        $jobName = $_POST['jobName'];
        $companyName = $_POST['companyName'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $plz = $_POST['plz'];
        $homepage = $_POST['homepage'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $req = $_POST['req'];
        $applicationType = $_POST['applicationType'];
        $applicationTime = $_POST['applicationTime'];
        $workingHoursStart = $_POST['workingHoursStart'];
        $workingHoursEnd = $_POST['workingHoursEnd'];
        $responsibility =  $_POST['responsibility'];
        $care = $_POST['care'];
        $companyExperience = $_POST['companyExperience'];
        $jobExperience = $_POST['jobExperience'];
        $personalRating = $_POST['personalRating'];
        $teacherRating = $_POST['teacherRating'];
        $teacherComment = $_POST['teacherComment'];

        $editOrSave = "Bearbeiten";
        $disabled = "readonly";
        $disabledTeacher = "readonly";
        $disabledSelect = "disabled";
        $disabledSelectTeacher = "disabled";

        $sqlQuery = "UPDATE Job SET jobName = '$jobName', companyName = '$companyName', companyAddress = '$address', companyCity = '$city',
        companyPLZ = '$plz', companyHomepage = '$homepage', companyTel = '$tel', companyEmail = '$email',
        applicationReq = '$req',  applicationType = '$applicationType',  applicationTime = '$applicationTime', workingHoursStart = '$workingHoursStart',
        workingHoursEnd = '$workingHoursEnd',  responsibility = '$responsibility', careRating = '$care', companyExperienceRating = '$companyExperience',
        jobExperienceRating = '$jobExperience',  personalRating = '$personalRating', teacherRating = '$teacherRating', teacherComment = '$teacherComment'
        WHERE jobID ='$jobID' ";
        $query = $connection->prepare($sqlQuery);
        $query->execute();
    } elseif (isset($_POST['delete'])) {
        $sqlQuery = 'DELETE FROM Job WHERE jobID =' . $jobID . ' ';
        $query = $connection->prepare($sqlQuery);
        $query->execute();

        echo '<meta http-equiv="refresh" content="0; URL=administrate.php">';
    }
    ?>

    <title>Verwaltung - Praktikumsdatenbank HoLa</title>

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
                    <h2 class="text-white">
                        Hier können Sie die einzelnen Praktikumsbewertungen Ihrer Klassen und Kurse freigeben, bearbeiten oder löschen.
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
            <main class="container-fluid mt-3">
                <form class="grid needs-validation" id="form1" name="form1" accept-charset="utf-8" action="administrateDetails.php<?php echo "?jobID=" . $jobID . "&pinID=" . $pinID . "" ?>" method="POST" novalidate>
                    <fieldset class="row p-3">
                        <legend class="fw-bold fs-5">Persönliche Daten des Schülers / der Schülerin (werden später nicht in der Datenbank angezeigt)</legend>
                        <div class="col">
                            <label class="form-label" for="firstName">Vorname:</label>
                            <input class="rounded form-control" type="text" data-index="1" name="firstName" maxlength="50" placeholder="Gib bitte deinen Vornamen ein." value="<?php echo $firstName; ?>" disabled>
                        </div>
                        <div class="col">
                            <label class="form-label" for="lastName">Nachname:</label>
                            <input class="rounded form-control" type="text" data-index="2" name="lastName" maxlength="50" placeholder="Gib bitte deinen Nachnamen ein." value="<?php echo $lastName; ?>" disabled>
                        </div>
                    </fieldset>

                    <fieldset class="row p-3">
                        <legend class="fw-bold fs-5">Beruf</legend>
                        <div class="col">
                            <label class="form-label" for="jobName">Berufsbezeichnung:</label>
                            <input class="rounded form-control" type="text" data-index="4" name="jobName" maxlenght="100" placeholder="Gib bitte eine Berufsbezeichnung ein." value="<?php echo $jobName; ?>" <?php echo $disabled ?> required autocomplete="off">
                            <div class="invalid-feedback">
                                Geben Sie bitte eine Berufsbezeichnung ein.
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="p-3">
                        <legend class="fw-bold fs-5">Betrieb</legend>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="companyName">Name des Betriebs:</label>
                                <input class="rounded form-control" type="text" data-index="5" name="companyName" maxlenght="100" placeholder="Gib bitte einen Betriebsnamen ein." value="<?php echo $companyName; ?>" <?php echo $disabled ?> required autocomplete="off">
                                <div class="invalid-feedback">
                                    Geben Sie bitte einen Betriebsnamen ein.
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="address">Straße und Hausnummer:</label>
                                <input class="rounded form-control" type="text" data-index="6" name="address" maxlenght="100" placeholder="Gib bitte eine Adresse ein." value="<?php echo $address; ?>" <?php echo $disabled ?> required autocomplete="off">
                                <div class="invalid-feedback">
                                    Geben Sie bitte eine Adresse ein.
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="plz">Postleitzahl:</label>
                                <input class="rounded form-control" type="text" data-index="7" name="plz" minlength="5" maxlength="5" onkeypress="validatePlz(event)" placeholder="Gib bitte eine Postleitzahl ein." value="<?php echo $plz; ?>" <?php echo $disabled ?> required autocomplete="off">
                                <div class=" invalid-feedback">
                                    Geben Sie bitte eine Postleitzahl ein.
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="city">Ort:</label>
                                <input class="rounded form-control" type="text" data-index="8" name="city" maxlenght="25" placeholder="Gib bitte einen Ort ein." value="<?php echo $city; ?>" <?php echo $disabled ?> required autocomplete="off">
                                <div class="invalid-feedback">
                                    Geben Sie bitte einen Ort ein.
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="homepage">Homepage:</label>
                                <input class="rounded form-control" type="url" data-index="9" name="homepage" placeholder="Optional" maxlenght="100" value="<?php echo $homepage; ?>" <?php echo $disabled ?> autocomplete="off">
                            </div>

                            <div class="col">
                                <label class="form-label" for="email">E-Mail-Adresse:</label>
                                <input class="rounded form-control" type="email" data-index="10" name="email" placeholder="Optional" maxlenght="100" value="<?php echo $email; ?>" <?php echo $disabled ?> autocomplete="off">
                            </div>


                            <div class="col">
                                <label class="form-label" for="tel">Telefonnummer:</label>
                                <input class="rounded form-control" type="text" data-index="11" name="tel" placeholder="Optional" maxlenght="50" onkeypress="validateTel(event)" value="<?php echo $tel; ?>" <?php echo $disabled ?> autocomplete="off">
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="applicationType">Die Bewerbung erfolgte:</label>
                                <select class="form-select rounded form-control" data-index="12" name="applicationType" <?php echo $disabled ?> required>
                                    <option value="" disabled <?php echo ($applicationType == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                    <option value="0" <?php echo $disabledSelect ?><?php echo ($applicationType == "0" ? "selected" : ""); ?>>persönlich im Betrieb</option>
                                    <option value="1" <?php echo $disabledSelect ?><?php echo ($applicationType == "1" ? "selected" : ""); ?>>telefonisch</option>
                                    <option value="2" <?php echo $disabledSelect ?><?php echo ($applicationType == "2" ? "selected" : ""); ?>>per E-Mail</option>
                                    <option value="3" <?php echo $disabledSelect ?> <?php echo ($applicationType == "3" ? "selected" : ""); ?>>online (Homepage der Firma)</option>
                                    <option value="4" <?php echo $disabledSelect ?><?php echo ($applicationType == "4" ? "selected" : ""); ?>>per Post (schriftliche Bewerbung)</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wählen Sie bitte eine Bewerbungsart aus.
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="applicationTime">Zeitpunkt der Bewerbung:</label>
                                <div class="input-group has-validation">
                                    <select class="form-select rounded-start form-control" name="applicationTime" <?php echo $disabled ?> required>
                                        <option value="" disabled <?php echo ($applicationTime == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                        <option value="0" <?php echo $disabledSelect ?><?php echo ($applicationTime == "0" ? "selected" : ""); ?>>mehr als 12 Monate</option>
                                        <option value="1" <?php echo $disabledSelect ?><?php echo ($applicationTime == "1" ? "selected" : ""); ?>>6 - 12 Monate</option>
                                        <option value="2" <?php echo $disabledSelect ?><?php echo ($applicationTime == "2" ? "selected" : ""); ?>>3 - 6 Monate</option>
                                        <option value="3" <?php echo $disabledSelect ?><?php echo ($applicationTime == "3" ? "selected" : ""); ?>>weniger als 3 Monate</option>
                                    </select>
                                    <span class="input-group-text rounded-end" for="applicationType">vor Beginn des Praktikums</span>
                                    <div class="invalid-feedback">
                                        Wählen Sie bitte einen Bewerbungszeitpunkt aus.
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="workingHoursStart">tägliche Arbeitszeit:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text rounded-start">von:</span>
                                    <input class="form-control" type="time" data-index="13" name="workingHoursStart" value="<?php echo $workingHoursStart; ?>" <?php echo $disabled ?> required autocomplete="off">
                                    <span class="input-group-text rounded-0">Uhr bis:</span>
                                    <input class="form-control" type="time" data-index="14" name="workingHoursEnd" value="<?php echo $workingHoursEnd; ?>" <?php echo $disabled ?> required autocomplete="off">
                                    <span class="input-group-text rounded-end">Uhr</span>
                                    <div class="invalid-feedback">
                                        Geben Sie bitte die tägliche Arbeitszeit ein.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="req">Voraussetzungen:</label>
                                <textarea class="rounded form-control" rows="4" data-index="15" cols="50" name="req" placeholder="Optional" maxlenght="1000" <?php echo $disabled ?>><?php echo $req; ?></textarea>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="p-3">
                        <legend class="fw-bold fs-5">Bewertung durch den Schüler (in Schulnoten)</legend>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="responsibility">Hast du im Praktikum eigenverantworliche Tätigkeiten ausüben können?</label>
                                <select class="form-select rounded form-control" name="responsibility" <?php echo $disabled ?> required>
                                    <option value="" disabled <?php echo ($responsibility == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                    <option value="1" <?php echo $disabledSelect ?><?php echo ($responsibility == "1" ? "selected" : ""); ?>>Ja</option>
                                    <option value="0" <?php echo $disabledSelect ?><?php echo ($responsibility == "0" ? "selected" : ""); ?>>Nein</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wählen Sie bitte eine Antwort aus.
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="care">Bewertung der Praktikantenbetreuung im Betrieb:</label>
                                <select class="form-select rounded form-control" name="care" <?php echo $disabled ?> required>
                                    <option value="" disabled <?php echo ($care == "" ? "selected" : ""); ?>>Bitte auswählen</option>
                                    <option value="2" <?php echo $disabledSelect ?><?php echo ($care  == "2" ? "selected" : ""); ?>>1</option>
                                    <option value="3" <?php echo $disabledSelect ?><?php echo ($care  == "3" ? "selected" : ""); ?>>2</option>
                                    <option value="3" <?php echo $disabledSelect ?><?php echo ($care  == "3" ? "selected" : ""); ?>>3</option>
                                    <option value="4" <?php echo $disabledSelect ?><?php echo ($care  == "4" ? "selected" : ""); ?>>4</option>
                                    <option value="5" <?php echo $disabledSelect ?><?php echo ($care  == "5" ? "selected" : ""); ?>>5</option>
                                    <option value="6" <?php echo $disabledSelect ?><?php echo ($care  == "6" ? "selected" : ""); ?>>6</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wählen Sie bitte eine Antwort aus.
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="companyExperience">Einblick in den Betrieb:</label>
                                <select class="form-select rounded form-control" name="companyExperience" <?php echo $disabled ?> required>
                                    <option value="" disabled <?php echo ($companyExperience == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                    <option value="1" <?php echo $disabledSelect ?><?php echo ($companyExperience == "1" ? "selected" : ""); ?>>1</option>
                                    <option value="2" <?php echo $disabledSelect ?><?php echo ($companyExperience == "2" ? "selected" : ""); ?>>2</option>
                                    <option value="3" <?php echo $disabledSelect ?><?php echo ($companyExperience == "3" ? "selected" : ""); ?>>3</option>
                                    <option value="4" <?php echo $disabledSelect ?><?php echo ($companyExperience == "4" ? "selected" : ""); ?>>4</option>
                                    <option value="5" <?php echo $disabledSelect ?><?php echo ($companyExperience == "5" ? "selected" : ""); ?>>5</option>
                                    <option value="6" <?php echo $disabledSelect ?><?php echo ($companyExperience == "6" ? "selected" : ""); ?>>6</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wählen Sie bitte eine Antwort aus.
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label" for="jobExperience">Einblick in den Beruf:</label>
                                <select class="form-select rounded form-control" name="jobExperience" <?php echo $disabled ?> required>
                                    <option value="" disabled <?php echo ($jobExperience == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                    <option value="1" <?php echo $disabledSelect ?><?php echo ($jobExperience == "1" ? "selected" : ""); ?>>1</option>
                                    <option value="2" <?php echo $disabledSelect ?><?php echo ($jobExperience == "2" ? "selected" : ""); ?>>2</option>
                                    <option value="3" <?php echo $disabledSelect ?><?php echo ($jobExperience == "3" ? "selected" : ""); ?>>3</option>
                                    <option value="4" <?php echo $disabledSelect ?><?php echo ($jobExperience == "4" ? "selected" : ""); ?>>4</option>
                                    <option value="5" <?php echo $disabledSelect ?><?php echo ($jobExperience == "5" ? "selected" : ""); ?>>5</option>
                                    <option value="6" <?php echo $disabledSelect ?><?php echo ($jobExperience == "6" ? "selected" : ""); ?>>6</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wählen Sie bitte eine Antwort aus.
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-label" for="personalRating">Persönliche Gesamtbewertung:</label>
                                <select class="form-select rounded form-control" name="personalRating" <?php echo $disabled ?> required>
                                    <option value="" disabled <?php echo ($personalRating == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                    <option value="1" <?php echo $disabledSelect ?><?php echo ($personalRating == "1" ? "selected" : ""); ?>>1</option>
                                    <option value="2" <?php echo $disabledSelect ?><?php echo ($personalRating == "2" ? "selected" : ""); ?>>2</option>
                                    <option value="3" <?php echo $disabledSelect ?><?php echo ($personalRating == "3" ? "selected" : ""); ?>>3</option>
                                    <option value="4" <?php echo $disabledSelect ?><?php echo ($personalRating == "4" ? "selected" : ""); ?>>4</option>
                                    <option value="5" <?php echo $disabledSelect ?><?php echo ($personalRating == "5" ? "selected" : ""); ?>>5</option>
                                    <option value="6" <?php echo $disabledSelect ?><?php echo ($personalRating == "6" ? "selected" : ""); ?>>6</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wählen Sie bitte eine Antwort aus.
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="p-3">
                        <legend class="fw-bold fs-5">Bewertung durch die Lehrkraft</legend>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="teacherRating">Einschätzung der Lehrkraft:</label>
                                <select class="form-select rounded form-control" name="teacherRating" <?php echo $disabledTeacher ?> required>
                                    <option value="" disabled <?php echo ($teacherRating == "" ? "selected" : ""); ?>>Bitte auswählen...</option>
                                    <option value="0" <?php echo $disabledSelectTeacher ?><?php echo ($teacherRating == "0" ? "selected" : ""); ?>>sehr sinnvoll</option>
                                    <option value="1" <?php echo $disabledSelectTeacher ?><?php echo ($teacherRating == "1" ? "selected" : ""); ?>>sinnvoll</option>
                                    <option value="2" <?php echo $disabledSelectTeacher ?><?php echo ($teacherRating == "2" ? "selected" : ""); ?>>weniger sinnvoll</option>
                                    <option value="3" <?php echo $disabledSelectTeacher ?><?php echo ($teacherRating == "3" ? "selected" : ""); ?>>nicht sinnvoll</option>
                                </select>
                                <div class="invalid-feedback">
                                    Wählen Sie bitte eine Antwort aus.
                                </div>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label class="form-label" for="teacherComment">Anmerkungen der Lehrkraft:</label>
                                <textarea class="rounded form-control" rows="4" cols="50" name="teacherComment" maxlenght="1000" placeholder="Optional" <?php echo $disabledTeacher ?>><?php echo $teacherComment; ?></textarea>
                            </div>
                        </div>
                    </fieldset>

                    <div class="row p-3 mb-3">
                        <div class="col">
                            <a class="input-group-text btn btn-outline-primary rounded-pill" style="width: 100%;" href="administrate.php">Zurück zur Verwaltungsseite</a>
                        </div>
                        <div class="col">
                            <input class="input-group-text btn btn-warning rounded-pill" style="width: 100%;" type="submit" name="approve" value="Speichern und Freigeben">
                        </div>
                        <div class="col">
                            <input class="input-group-text btn btn-secondary rounded-pill" style="width: 100%;" type="submit" name=<?php echo $editOrSave ?> value=<?php echo $editOrSave ?>>
                        </div>
                        <div class="col">
                            <input class="input-group-text btn btn-danger rounded-pill" style="width: 100%;" type="submit" name="delete" value="Löschen">
                        </div>
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